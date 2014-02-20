<?php

namespace Zeteq\BlogBundle\Controller;

 
use Symfony\Component\HttpFoundation\Request;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\BlogBundle\Entity\BlogPostCategory;
use Zeteq\BlogBundle\Form\BlogPostCategoryType;

/**
 * BlogPostCategory controller.
 *
 */
class BlogPostCategoryController extends Controller
{

    /**
     * Lists all BlogPostCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

     $source = new Entity('ZeteqBlogBundle:BlogPostCategory');
 

         $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10,25,50,100,1000));
        $title= "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));

        
        $rowActionDelete = new RowAction('delete', 'blogpostcategory_delete',true);   
        $rowAction = new RowAction('edit', 'blogpostcategory_edit');

 
        $grid->addRowAction($rowAction);    
        $grid->addRowAction($rowActionDelete);    

        $callback = 'ZeteqBlogBundle\BlogPostCategoryController::delete';


        $grid->addMassAction(new DeleteMassAction());
    $grid->hideColumns(array(
        
    'id'));





        $grid->isReadyForRedirect();
        
        




return $grid->getGridResponse('ZeteqBlogBundle:BlogPostCategory:index.html.twig');
    }
    /**
     * Creates a new BlogPostCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BlogPostCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blogpostcategory_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqBlogBundle:BlogPostCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a BlogPostCategory entity.
    *
    * @param BlogPostCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogPostCategory $entity)
    {
        $form = $this->createForm(new BlogPostCategoryType(), $entity, array(
            'action' => $this->generateUrl('blogpostcategory_create'),
            'method' => 'POST',
        ));

         

        return $form;
    }

    /**
     * Displays a form to create a new BlogPostCategory entity.
     *
     */
    public function newAction()
    {
        $entity = new BlogPostCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqBlogBundle:BlogPostCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BlogPostCategory entity.
     *
     */


    /**
     * Displays a form to edit an existing BlogPostCategory entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPostCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPostCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqBlogBundle:BlogPostCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BlogPostCategory entity.
    *
    * @param BlogPostCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogPostCategory $entity)
    {
        $form = $this->createForm(new BlogPostCategoryType(), $entity, array(
            'action' => $this->generateUrl('blogpostcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    

        return $form;
    }
    /**
     * Edits an existing BlogPostCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPostCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPostCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blogpostcategory_edit', array('id' => $id)));
        }

        return $this->render('ZeteqBlogBundle:BlogPostCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BlogPostCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqBlogBundle:BlogPostCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogPostCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
  

        return $this->redirect($this->generateUrl('blogpostcategory'));
    }

    /**
     * Creates a form to delete a BlogPostCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogpostcategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
