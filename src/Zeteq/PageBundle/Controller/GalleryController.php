<?php

namespace Zeteq\PageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Gallery;
use Zeteq\PageBundle\Form\GalleryType;

use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

/**
 * Gallery controller.
 *
 */
class GalleryController extends Controller
{
    
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $source = new Entity('ZeteqPageBundle:Gallery');
        $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10, 25, 50, 100, 1000));
        $title = "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));


        $rowActionDelete = new RowAction('delete', 'gallery_delete', true);
        $rowAction = new RowAction('edit', 'gallery_edit');




        $grid->addRowAction($rowAction);
        $grid->addRowAction($rowActionDelete);

        $callback = 'ZeteqPageBundle\GalleryController::delete';
        $grid->addMassAction(new DeleteMassAction());
        $grid->hideColumns(array( 
            ));





        $grid->isReadyForRedirect();


        return $grid->getGridResponse('ZeteqPageBundle:Gallery:indexapy.html.twig');
    }

    /**
     * Lists all Gallery entities.
     *
     */
    public function index1Action()
    {
        $em = $this->getDoctrine()->getManager();


    $dql   = "SELECT a FROM ZeteqPageBundle:Gallery a";
    $query = $em->createQuery($dql);

   $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1),10);





        return $this->render('ZeteqPageBundle:Gallery:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new Gallery entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Gallery();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
 
            return $this->redirect($this->generateUrl('gallery_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Gallery:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Gallery entity.
    *
    * @param Gallery $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Gallery $entity)
    {
        $form = $this->createForm(new GalleryType(), $entity, array(
            'action' => $this->generateUrl('gallery_create'),
            'method' => 'POST',
        ));


        return $form;
    }

    /**
     * Displays a form to create a new Gallery entity.
     *
     */
    public function newAction()
    {
        $entity = new Gallery();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Gallery:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Gallery entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Gallery:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Gallery entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Gallery:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Gallery entity.
    *
    * @param Gallery $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Gallery $entity)
    {
        $form = $this->createForm(new GalleryType(), $entity, array(
            'action' => $this->generateUrl('gallery_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));


        return $form;
    }
    /**
     * Edits an existing Gallery entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
 
            return $this->redirect($this->generateUrl('gallery_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Gallery:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Gallery entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

     
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Gallery')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gallery entity.');
            }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('gallery'));
    }

    /**
     * Creates a form to delete a Gallery entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallery_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
