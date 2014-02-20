<?php

namespace Zeteq\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends Controller {

    public function indexAction() {
        return $this->render('ZeteqAdminBundle:Admin:index.html.twig');
    }

    public function howtoAction() {
        return $this->render('ZeteqAdminBundle:Admin:howto.html.twig');
    }

    public function iconsAction() {
        return $this->render('ZeteqAdminBundle:Admin:icons.html.twig');
    }

    public function designAction() {
        $path = dirname($this->get('kernel')->getRootDir());

        $front = $path . '/src/Zeteq/FrontBundle/Resources/views/';
        $css = $path . '/web/css/';
        $js = $path . '/web/js/';
        $upload = $path . '/web/upload/';


        return $this->render('ZeteqAdminBundle:Admin:design.html.twig', array(
                    'path' => $path,
                    'front' => $front,
                    'css' => $css,
                    'js' => $js,
                    'upload' => $upload,
        ));
    }

    public function show_dirAction(Request $request) {

        $path = $request->query->get('path', $this->get('kernel')->getRootDir() . '/../src/Zeteq/FrontBundle/Resources/views/');




        $filefinder = new Finder();
        $filefinder->depth('== 0');

        $dirfinder = new Finder();
        $dirfinder->depth('== 0');


        $files = $filefinder->files()->in($path)->notName('*~');
        $dirs = $dirfinder->directories()->in($path);
        return $this->render('ZeteqAdminBundle:Admin:show_dir.html.twig', array(
                    'files' => $files,
                    'dirs' => $dirs,
                    'path' => $path
        ));
    }

    public function show_css_dirAction(Request $request) {

        $path = $request->query->get('path', $this->get('kernel')->getRootDir() . '/../src/Zeteq/FrontBundle/Resources/views/');




        $filefinder = new Finder();
        $filefinder->depth('== 0');

        $dirfinder = new Finder();
        $dirfinder->depth('== 0');


        $files = $filefinder->files()->in($path)->notName('*~');
        $dirs = $dirfinder->directories()->in($path);
        return $this->render('ZeteqAdminBundle:Admin:show_dir.html.twig', array(
                    'files' => $files,
                    'dirs' => $dirs,
                    'path' => $path
        ));
    }

    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                    SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
                        'ZeteqAdminBundle:Admin:login.html.twig', array(
                    // last username entered by the user
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
                        )
        );
    }

    public function edit_fileAction(Request $request) {
        $rootpath = dirname($this->get('kernel')->getRootDir());
        $path = $request->query->get("path");
        $fullpath = $rootpath . $path;
        //   $fullpath = $path;
        $file_content = file_get_contents($fullpath);
        //   $id = time();
//   $title(basename($path));   


        return $this->redirect($this->generateUrl('filemanager_editfile', array('path' => $fullpath)));
    }

    public function backup_databaseAction(Request $request) {

        $user = $this->container->getParameter('database_user');
        $db = $this->container->getParameter('database_name');
        $pass = $this->container->getParameter('database_password');
        $rootpath = dirname($this->get('kernel')->getRootDir());
        $filename = $db . '_' . date('M_d_Y_h_ia') . '.sql';
        $path = $rootpath . '/db/' . $filename;


        $command = "mysqldump $db --password='".$pass."' --user=$user > $path";
        // $command = "mysqldump $db --password=".$pass." --user=$user --single-transaction >".$path;
        $result = exec($command, $val);

        if ($val == '') {/* no output is good */
        } else {/* we have something to log the output here */
        }



               return $this->render('ZeteqAdminBundle:Admin:backup_database.html.twig',array('val' => $val, 'db' => $db, 'result' => $result, 'command' => $command));
    }


            public function restore_database_selectAction(Request $request) 
     {
                
        $rootpath = dirname($this->get('kernel')->getRootDir());
        $path = $rootpath . '/db/';                
                

    $filefinder = new Finder();
   
  $filefinder->depth('== 0');
          $files = $filefinder->files()->in($path)->sortByAccessedTime('DESC')->notName('*~'); 
        

        return $this->render('ZeteqAdminBundle:Admin:restore_database_select.html.twig', array(

            'files'   => $files 
    
        ));
        
        
     }
    
    public function restore_databaseAction(Request $request,$filename) 
     {

        $user = $this->container->getParameter('database_user');
        $db = $this->container->getParameter('database_name');
        $pass = $this->container->getParameter('database_password');
        $rootpath = dirname($this->get('kernel')->getRootDir());

        $path = $rootpath . '/db/' . $filename;


        $command = "mysql $db --password='".$pass."' --user=$user < $path";
        // $command = "mysqldump $db --password=".$pass." --user=$user --single-transaction >".$path;
        $result = exec($command, $val);

        if ($val == '') {/* no output is good */
        } else {/* we have something to log the output here */
        }



        //return new JsonResponse(array('val' => $val, 'db' => $db, 'result' => $result, 'command' => $command));
    
            return $this->render('ZeteqAdminBundle:Admin:restore_database.html.twig', array(

            'filename'   => $filename
    
        ));
        
        
        }
    
    
}
