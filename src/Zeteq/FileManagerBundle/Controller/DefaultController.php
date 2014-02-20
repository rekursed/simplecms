<?php

namespace Zeteq\FileManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller {

    public function filemanager_rootAction() {

        $filefinder = new Finder();
        
        
        $filefinder->depth('== 0');

        $dirfinder = new Finder();
        $dirfinder->depth('== 0');

$path = dirname($this->get('kernel')->getRootDir()) ;
$prev = dirname($path);
        $files = $filefinder->files()->in($path)->notName('*~');
        $dirs = $dirfinder->directories()->in($path)->notName('*~');
        return $this->render('ZeteqFileManagerBundle:Default:filemanager_root.html.twig', array(
                    'files' => $files,
                    'dirs' => $dirs,
                   'path' =>$path,
                'prev' =>$prev
                ));
    }

    public function filemanager_open_dirAction(Request $request) {
        $path = $request->query->get('path');

        $filefinder = new Finder();
        $filefinder->depth('== 0');

        $dirfinder = new Finder();
        $dirfinder->depth('== 0');
$prev = dirname($path);

        $files = $filefinder->files()->in($path)->notName('*~');
        $dirs = $dirfinder->directories()->in($path)->notName('*~');
        return $this->render('ZeteqFileManagerBundle:Default:filemanager_root.html.twig', array(
                    'files' => $files,
                    'dirs' => $dirs,
              'path' =>$path,
                  'prev' =>$prev
                ));
    }
    public function filemanager_delete_dirAction(Request $request){
         $path = $request->query->get('path');
         $this->deleteAll($path, false);
            
        $referer = $request->query->get('referer', $request->headers->get('referer'));
        return new RedirectResponse($referer);    
            
    }
     public function filemanager_mkdirAction(Request $request){
 
                $path = $request->query->get('path');
 
        if ($request->isMethod('POST')) {
            $path = $request->request->get('path');
            mkdir($path.'/'.$request->request->get('new_dir_name'));
 

            return $this->redirect($this->generateUrl('filemanager_open_dir', array('path' => $path)));
        }



        return $this->render('ZeteqFileManagerBundle:Default:mkdir.html.twig', array(
                    'path' => $path,
            
                ));
         
         
            
    }
    
    
    
    public function filemanager_new_dirAction(Request $request){
         $path = $request->query->get('path');
         $name = $request->query->get('path');
         $this->deleteAll($path, false);
            
        $referer = $request->query->get('referer', $request->headers->get('referer'));
        return new RedirectResponse($referer);    
            
    }
    public function template_folderAction() {

        $finder = new Finder();
        $finder->files()->in($this->get('kernel')->getRootDir() . '/../src/Zeteq/ThemeBundle/Resources/views/default');


        return $this->render('ZeteqFileManagerBundle:Default:template_folder.html.twig', array('finder' => $finder));
    }

    public function edit_fileAction(Request $request) 
            {

        $path = $request->query->get("path");
        //   $fullpath = $path;
        $file_content = file_get_contents($path);
        $file_name = basename($path);
        //   $id = time();
//   $title(basename($path));   

        return $this->render('ZeteqFileManagerBundle:Default:edit_file.html.twig', array(
                    'path' => $path,
                    'file_content' => $file_content,
            'file_name' => $file_name
                ));
    }

    public function save_fileAction(Request $request) {

        $path = $request->request->get("path");
        
        
        $path_parts = pathinfo($path);
        $date = date('d_M_Y_h_i', strtotime('now'));
        $newname = $path_parts['filename'] . '_backup_' . $date . '.' . $path_parts['extension'].'.backup';
        copy($path, $path_parts['dirname'] . '/' . $newname);
        
        
        
        $file_content = $request->request->get('file_content');

        $fh = fopen($path, 'w');
        $val = fwrite($fh, $file_content);
        fclose($fh);

        return $this->render('ZeteqFileManagerBundle:Default:edit_file.html.twig', array(
                    'path' => $path,
                    'file_content' => $file_content
                ));
    }

    public function delete_fileAction(Request $request) {

        $path = $request->query->get('path');
        unlink($path);
        $referer = $request->query->get('referer', $request->headers->get('referer'));
        return new RedirectResponse($referer);
    }

    public function backup_fileAction(Request $request) {

        $path = $request->query->get('path');
        $path_parts = pathinfo($path);
        $date = date('d_M_Y_h_i', strtotime('now'));
        $newname = $path_parts['filename'] . '_' . $date . '.' . $path_parts['extension'];



        copy($path, $path_parts['dirname'] . '/' . $newname);

        $referer = $request->query->get('referer', $request->headers->get('referer'));
        return new RedirectResponse($referer);
    }

    public function rename_fileAction(Request $request) {
        $path = $request->query->get('path');
        $path_parts = pathinfo($path);
        if ($request->isMethod('POST')) {
            $path = $request->request->get('path');
            $path_parts = pathinfo($path);
            $newfilename = $request->request->get('newfilename');
            $oldfilename = basename($path);
            rename($path, $path_parts['dirname'] . '/' . $newfilename);

            return $this->redirect($this->generateUrl('filemanager_open_dir', array('path' => $path_parts['dirname'])));
        }



        return $this->render('ZeteqFileManagerBundle:Default:rename_file.html.twig', array(
                    'path' => $path,
                    'name' => $path_parts['basename'],
                ));
    }

    public function download_fileAction(Request $request) {
        
    }

    public function copy_fileAction(Request $request) {


        $path = $request->query->get('path');
        $path_parts = pathinfo($path);

        $newname = $path_parts['filename'] . '_copy.' . $path_parts['extension'];



        copy($path, $path_parts['dirname'] . '/' . $newname);

        $referer = $request->query->get('referer', $request->headers->get('referer'));
        return new RedirectResponse($referer);
    }

    public function move_fileAction(Request $request) {


        if ($request->isMethod(sfRequest::POST)) {
            $oldpath = $request->getParameter('oldpath');
            $newpath = $request->getParameter('newpath');
            $filename = $request->getParameter('filename');
            copy($oldpath . $filename, $newpath . $filename);
            unlink($oldpath . $filename);
            $this->redirect($request->getReferer());
        }
    }

    public function new_fileAction(Request $request) {
        
    }

    public function uploadAction(Request $request) {
        $path = $request->query->get('path');
        return $this->render('ZeteqFileManagerBundle:Default:upload.html.twig',array(
            
              'path' =>$path
        ));
    }
    public function move_uploaded_filesAction(Request $request) {
        
        $files = $request->files->get('file');  //$_FILES;
          $path = $request->request->get('path');
        $f = array();
        foreach($files as $file){
            
            $file->move($path,$file->getClientOriginalName());
        }
            return $this->redirect($this->generateUrl('filemanager_open_dir', array('path' => $path)));
    }
    
    
       function deleteAll($directory, $empty = false) {
        if (substr($directory, -1) == "/") {
            $directory = substr($directory, 0, -1);
        }

        if (!file_exists($directory) || !is_dir($directory)) {
            return false;
        } elseif (!is_readable($directory)) {
            return false;
        } else {
            $directoryHandle = opendir($directory);

            while ($contents = readdir($directoryHandle)) {
                if ($contents != '.' && $contents != '..') {
                    $path = $directory . "/" . $contents;

                    if (is_dir($path)) {
                        $this->deleteAll($path);
                    } else {
                        unlink($path);
                    }
                }
            }

            closedir($directoryHandle);

            if ($empty == false) {
                if (!rmdir($directory)) {
                    return false;
                }
            }

            return true;
        }
    }
    
    
}
