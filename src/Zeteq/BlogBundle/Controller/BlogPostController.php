<?php

namespace Zeteq\BlogBundle\Controller;

 
use Symfony\Component\HttpFoundation\Request;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\BlogBundle\Entity\BlogPost;
use Zeteq\BlogBundle\Form\BlogPostType;

/**
 * BlogPost controller.
 *
 */
class BlogPostController extends Controller
{

    /**
     * Lists all BlogPost entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

     $source = new Entity('ZeteqBlogBundle:BlogPost');
 

         $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10,25,50,100,1000));
        $title= "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));

        
        $rowActionDelete = new RowAction('delete', 'blogpost_delete',true);   
        $rowAction = new RowAction('edit', 'blogpost_edit');

 
        $grid->addRowAction($rowAction);    
        $grid->addRowAction($rowActionDelete);    

        $callback = 'ZeteqBlogBundle\BlogPostController::delete';


        $grid->addMassAction(new DeleteMassAction());
    $grid->hideColumns(array(
        
    'body','created','slug','overview'));





        $grid->isReadyForRedirect();
        
        




return $grid->getGridResponse('ZeteqBlogBundle:BlogPost:index.html.twig');
    }
    /**
     * Creates a new BlogPost entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BlogPost();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blogpost_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqBlogBundle:BlogPost:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a BlogPost entity.
    *
    * @param BlogPost $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogPost $entity)
    {
        $form = $this->createForm(new BlogPostType(), $entity, array(
            'action' => $this->generateUrl('blogpost_create'),
            'method' => 'POST',
        ));

         

        return $form;
    }

    /**
     * Displays a form to create a new BlogPost entity.
     *
     */
    public function newAction()
    {
        $entity = new BlogPost();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqBlogBundle:BlogPost:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BlogPost entity.
     *
     */


    /**
     * Displays a form to edit an existing BlogPost entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPost')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPost entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqBlogBundle:BlogPost:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BlogPost entity.
    *
    * @param BlogPost $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogPost $entity)
    {
        $form = $this->createForm(new BlogPostType(), $entity, array(
            'action' => $this->generateUrl('blogpost_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    

        return $form;
    }
    /**
     * Edits an existing BlogPost entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPost')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPost entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blogpost_edit', array('id' => $id)));
        }

        return $this->render('ZeteqBlogBundle:BlogPost:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BlogPost entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqBlogBundle:BlogPost')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogPost entity.');
            }

            $em->remove($entity);
            $em->flush();
  

        return $this->redirect($this->generateUrl('blogpost'));
    }

    /**
     * Creates a form to delete a BlogPost entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogpost_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
