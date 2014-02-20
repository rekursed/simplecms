<?php

namespace Zeteq\PageBundle\Controller;

 
use Symfony\Component\HttpFoundation\Request;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Slot;
use Zeteq\PageBundle\Form\SlotType;

/**
 * Slot controller.
 *
 */
class SlotController extends Controller
{

    /**
     * Lists all Slot entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

     $source = new Entity('ZeteqPageBundle:Slot');
 

         $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10,25,50,100,1000));
        $title= "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));

        
        $rowActionDelete = new RowAction('delete', 'slot_delete',true);   
        $rowAction = new RowAction('edit', 'slot_edit');

 
        $grid->addRowAction($rowAction);    
        $grid->addRowAction($rowActionDelete);    

        $callback = 'ZeteqPageBundle\SlotController::delete';


        $grid->addMassAction(new DeleteMassAction());
    $grid->hideColumns(array(
        
    'body'));





        $grid->isReadyForRedirect();
        
        




return $grid->getGridResponse('ZeteqPageBundle:Slot:index.html.twig');
    }
    /**
     * Creates a new Slot entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Slot();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
             $em->flush();
            
      $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Slots/'.$entity->getId().'.html.twig';
        $file_content = $entity->getBody();
        $fh = fopen($path, 'w');
        $val = fwrite($fh, $file_content);
        fclose($fh);
            
            
           

            return $this->redirect($this->generateUrl('slot_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Slot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Slot entity.
    *
    * @param Slot $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Slot $entity)
    {
        $form = $this->createForm(new SlotType(), $entity, array(
            'action' => $this->generateUrl('slot_create'),
            'method' => 'POST',
        ));

         

        return $form;
    }

    /**
     * Displays a form to create a new Slot entity.
     *
     */
    public function newAction()
    {
        $entity = new Slot();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Slot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Slot entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Slot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Slot:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Slot entity.
     *
     */
    public function editAction($id)
    {
  
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Slot')->find($id);
    $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Slots/'.$entity->getId().'.html.twig';
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slot entity.');
        }
        
                  $file_content = file_get_contents($path);
                  $entity->setBody($file_content);
                  $em->persist($entity);
                  $em->flush();
        
        
  $fh = fopen($path, 'w');
          $val = fwrite($fh, $entity->getBody());
          fclose($fh);
        
 
           

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Slot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Slot entity.
    *
    * @param Slot $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Slot $entity)
    {
        $form = $this->createForm(new SlotType(), $entity, array(
            'action' => $this->generateUrl('slot_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    

        return $form;
    }
    /**
     * Edits an existing Slot entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Slot')->find($id);
  $oldcontent = $entity->getBody();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            
            
       
                        
            //create a backup
    $backup_path = dirname($this->get('kernel')->getRootDir()) . '/backups/slots/'.$entity->getId();
       

            
        if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups'))
      {
      mkdir((dirname($this->get('kernel')->getRootDir()) . '/backups'));
      
}

  if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups/slots'))
      {
      mkdir((dirname($this->get('kernel')->getRootDir()) . '/backups/slots'));
      
}

  if(!file_exists(dirname($this->get('kernel')->getRootDir()) . '/backups/slots/'.$entity->getId()))
      {
      mkdir((dirname($this->get('kernel')->getRootDir()) . '/backups/slots/'.$entity->getId()));
      
}
    
    
    
    $backup_file = $backup_path.'/backup_'.date('Y_M-d_h_i').'.html.twig';
    $file_content_b = $oldcontent;
        $fhb = fopen($backup_file, 'w');
        $val = fwrite($fhb, $file_content_b);
        fclose($fhb);
        
        
        //first create backup of the old file then save new 
        
             $em->flush();  
            
            
 $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Slots/'.$entity->getId().'.html.twig';
 $file_content = $entity->getBody();
        $fh = fopen($path, 'w');
        $val = fwrite($fh, $file_content);
        fclose($fh);
            
            
            
          

            return $this->redirect($this->generateUrl('slot_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Slot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Slot entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Slot')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Slot entity.');
            }

            $em->remove($entity);
            $em->flush();
  

        return $this->redirect($this->generateUrl('slot'));
    }

    /**
     * Creates a form to delete a Slot entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('slot_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
