<?php

namespace Zeteq\PageBundle\Controller;

 
use Symfony\Component\HttpFoundation\Request;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Subscriber;
use Zeteq\PageBundle\Form\SubscriberType;

/**
 * Subscriber controller.
 *
 */
class SubscriberController extends Controller
{

    /**
     * Lists all Subscriber entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

     $source = new Entity('ZeteqPageBundle:Subscriber');
 

         $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10,25,50,100,1000));
        $title= "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));

        
        $rowActionDelete = new RowAction('delete', 'subscriber_delete',true);   
        $rowAction = new RowAction('edit', 'subscriber_edit');

 
        $grid->addRowAction($rowAction);    
        $grid->addRowAction($rowActionDelete);    

        $callback = 'ZeteqPageBundle\SubscriberController::delete';


        $grid->addMassAction(new DeleteMassAction());
    $grid->hideColumns(array(
        
    'id'));





        $grid->isReadyForRedirect();
        
        




return $grid->getGridResponse('ZeteqPageBundle:Subscriber:index.html.twig');
    }
    /**
     * Creates a new Subscriber entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Subscriber();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subscriber_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Subscriber:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Subscriber entity.
    *
    * @param Subscriber $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Subscriber $entity)
    {
        $form = $this->createForm(new SubscriberType(), $entity, array(
            'action' => $this->generateUrl('subscriber_create'),
            'method' => 'POST',
        ));

         

        return $form;
    }

    /**
     * Displays a form to create a new Subscriber entity.
     *
     */
    public function newAction()
    {
        $entity = new Subscriber();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Subscriber:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Subscriber entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Subscriber')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subscriber entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Subscriber:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Subscriber entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Subscriber')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subscriber entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Subscriber:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Subscriber entity.
    *
    * @param Subscriber $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Subscriber $entity)
    {
        $form = $this->createForm(new SubscriberType(), $entity, array(
            'action' => $this->generateUrl('subscriber_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    

        return $form;
    }
    /**
     * Edits an existing Subscriber entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Subscriber')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subscriber entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('subscriber_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Subscriber:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Subscriber entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Subscriber')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subscriber entity.');
            }

            $em->remove($entity);
            $em->flush();
  

        return $this->redirect($this->generateUrl('subscriber'));
    }

    /**
     * Creates a form to delete a Subscriber entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subscriber_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
