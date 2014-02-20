<?php

namespace Zeteq\PageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Site;
use Zeteq\PageBundle\Form\SiteType;

use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

/**
 * Site controller.
 *
 */
class SiteController extends Controller
{
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $source = new Entity('ZeteqPageBundle:Site');
        $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10, 25, 50, 100, 1000));
        $title = "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));


        $rowActionDelete = new RowAction('delete', 'site_delete', true);
        $rowAction = new RowAction('edit', 'site_edit');




        $grid->addRowAction($rowAction);
        $grid->addRowAction($rowActionDelete);

        $callback = 'ZeteqPageBundle\SiteController::delete';
        $grid->addMassAction(new DeleteMassAction());
        $grid->hideColumns(array( 'slogan','url' ,'email','slug', 
            //'enabled',
            'google_analytics','meta_description','meta_keywords','meta_copyright',
            'meta_application','facebook_title','facebook_type','facebook_image','facebook_url','facebook_description','facebook_app_id',
            'favicon_path','favicon'
            ));





        $grid->isReadyForRedirect();


        return $grid->getGridResponse('ZeteqPageBundle:Site:indexapy.html.twig');
    }

    /**
     * Lists all Site entities.
     *
     */
    public function index1Action()
    {
        $em = $this->getDoctrine()->getManager();


    $dql   = "SELECT a FROM ZeteqPageBundle:Site a";
    $query = $em->createQuery($dql);

   $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1),10);





        return $this->render('ZeteqPageBundle:Site:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new Site entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Site();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('site_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Site:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Site entity.
    *
    * @param Site $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Site $entity)
    {
        $form = $this->createForm(new SiteType(), $entity, array(
            'action' => $this->generateUrl('site_create'),
            'method' => 'POST',
        ));


        return $form;
    }

    /**
     * Displays a form to create a new Site entity.
     *
     */
    public function newAction()
    {
        $entity = new Site();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Site:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Site entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Site')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Site entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Site:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Site entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Site')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Site entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Site:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Site entity.
    *
    * @param Site $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Site $entity)
    {
        $form = $this->createForm(new SiteType(), $entity, array(
            'action' => $this->generateUrl('site_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));


        return $form;
    }
    /**
     * Edits an existing Site entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Site')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Site entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('site_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Site:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Site entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);


            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Site')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Site entity.');
            }

            $em->remove($entity);
            $em->flush();
     

        return $this->redirect($this->generateUrl('site'));
    }

    /**
     * Creates a form to delete a Site entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('site_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
