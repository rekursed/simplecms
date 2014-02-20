<?php

namespace Zeteq\PageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Page;
use Zeteq\PageBundle\Form\PageType;

use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use Symfony\Component\Finder\Finder;
/**
 * Page controller.
 *
 */
class PageController extends Controller

{
    
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $source = new Entity('ZeteqPageBundle:Page');
        $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10, 25, 50, 100, 1000));
        $title = "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));


        $rowActionDelete = new RowAction('delete', 'page_delete', true);
        $rowAction = new RowAction('edit', 'page_edit');


        $grid->addRowAction($rowAction);
        $grid->addRowAction($rowActionDelete);

        $callback = 'ZeteqPageBundle\PageController::delete';
        $grid->addMassAction(new DeleteMassAction());
        $grid->hideColumns(array(  	'template','layout','body'
            ));





        $grid->isReadyForRedirect();


        return $grid->getGridResponse('ZeteqPageBundle:Page:indexapy.html.twig');
    }

    /**
     * Lists all Page entities.
     *
     */
    public function index1Action()
    {
        $em = $this->getDoctrine()->getManager();


    $dql   = "SELECT a FROM ZeteqPageBundle:Page a";
    $query = $em->createQuery($dql);

   $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1),10);





        return $this->render('ZeteqPageBundle:Page:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new Page entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Page();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
          $em->flush();


        $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Pages/'.$entity->getId().'.html.twig';
        $file_content = $entity->getBody();
        $fh = fopen($path, 'w');
        $val = fwrite($fh, $file_content);
        fclose($fh);
        
        
        if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId())){
        mkdir(dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId());
        }
              
            return $this->redirect($this->generateUrl('page_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Page:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Page entity.
    *
    * @param Page $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Page $entity)
    {
        $form = $this->createForm(new PageType(), $entity, array(
            'action' => $this->generateUrl('page_create'),
            'method' => 'POST',
        ));

       

        return $form;
    }

    /**
     * Displays a form to create a new Page entity.
     *
     */
    public function newAction()
    {
        $entity = new Page();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Page:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

 


    /**
     * Displays a form to edit an existing Page entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Page')->find($id);
 $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Pages/'.$entity->getId().'.html.twig';
       
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        
        if(file_exists($path)){
                  $file_content = file_get_contents($path);
                  $entity->setBody($file_content);
                  $em->persist($entity);
                  $em->flush();
        }

        
   $fh = fopen($path, 'w');
          $val = fwrite($fh, $entity->getBody());
          fclose($fh);
        
        
 

        $editForm = $this->createEditForm($entity);
 
        
        $backup_path = dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId();
  
        
        if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups'))
      {
      mkdir((dirname($this->get('kernel')->getRootDir()) . '/backups'));
      
}

  if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups/pages'))
      {
      mkdir((dirname($this->get('kernel')->getRootDir()) . '/backups/pages'));
      
}

  if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId()))
      {
      mkdir((dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId()));
      
}
        
        $filefinder = new Finder();
   
  $filefinder->depth('== 0');
          $files = $filefinder->files()->in($backup_path)->sortByAccessedTime('DESC')->notName('*~'); 
        

        return $this->render('ZeteqPageBundle:Page:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'files'   => $files 
    
        ));
    }

    /**
    * Creates a form to edit a Page entity.
    *
    * @param Page $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Page $entity)
    {
        $form = $this->createForm(new PageType(), $entity, array(
            'action' => $this->generateUrl('page_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    

        return $form;
    }
    /**
     * Edits an existing Page entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        $oldcontent = $entity->getBody();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
         


            
            //create a backup
    $backup_path = dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId();
       
    if(!file_exists($backup_path)){
        mkdir($backup_path);
    }
    $backup_file = $backup_path.'/backup_'.date('Y_M-d_h_i').'.html.twig';
    $file_content_b = $oldcontent;
        $fhb = fopen($backup_file, 'w');
        $val = fwrite($fhb, $file_content_b);
        fclose($fhb);
            
            
            
        $em->flush();       
            
          $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Pages/'.$entity->getId().'.html.twig';
 $file_content = $entity->getBody();
        $fh = fopen($path, 'w');
        $val = fwrite($fh, $file_content);
        fclose($fh);
        
        
 
        
            
            return $this->redirect($this->generateUrl('page_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Page:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Page entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);


            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Page')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Page entity.');
            }

            $em->remove($entity);
            $em->flush();


        return $this->redirect($this->generateUrl('page'));
    }

    /**
     * Creates a form to delete a Page entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('page_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
