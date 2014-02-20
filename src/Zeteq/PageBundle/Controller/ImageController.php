<?php

namespace Zeteq\PageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Image;
use Zeteq\PageBundle\Form\ImageType;

use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

/**
 * Image controller.
 *
 */
class ImageController extends Controller
{
    
     public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $source = new Entity('ZeteqPageBundle:Image');
        $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10, 25, 50, 100, 1000));
        $title = "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));


        $rowActionDelete = new RowAction('delete', 'image_delete', true);
        $rowAction = new RowAction('edit', 'image_edit');




        $grid->addRowAction($rowAction);
        $grid->addRowAction($rowActionDelete);

        $callback = 'ZeteqPageBundle\ImageController::delete';
        $grid->addMassAction(new DeleteMassAction());
        $grid->hideColumns(array(
            'slug','body'
            ));





        $grid->isReadyForRedirect();


        return $grid->getGridResponse('ZeteqPageBundle:Image:indexapy.html.twig');
    }

    /**
     * Lists all Image entities.
     *
     */
    public function index1Action()
    {
        $em = $this->getDoctrine()->getManager();


    $dql   = "SELECT a FROM ZeteqPageBundle:Image a";
    $query = $em->createQuery($dql);

   $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1),10);





        return $this->render('ZeteqPageBundle:Image:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new Image entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Image();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
    if ($form->get('save_and_add')->isClicked()) {
    return $this->redirect($this->generateUrl('page_new') );
    }
            return $this->redirect($this->generateUrl('image_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Image:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Image entity.
    *
    * @param Image $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'action' => $this->generateUrl('image_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Image entity.
     *
     */
    public function newAction()
    {
        $entity = new Image();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Image:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Image entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Image:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Image entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Image:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Image entity.
    *
    * @param Image $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'action' => $this->generateUrl('image_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Image entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
    if ($editForm->get('save_and_add')->isClicked()) {
    return $this->redirect($this->generateUrl('page_new') );
    }
            return $this->redirect($this->generateUrl('image_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Image:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Image entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);


            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Image')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Image entity.');
            }

            $em->remove($entity);
            $em->flush();
 

        return $this->redirect($this->generateUrl('image'));
    }

    /**
     * Creates a form to delete a Image entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('image_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
