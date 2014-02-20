<?php

namespace Zeteq\PageBundle\Controller;

 
use Symfony\Component\HttpFoundation\Request;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\PageBundle\Entity\Menu;
use Zeteq\PageBundle\Form\MenuType;

/**
 * Menu controller.
 *
 */
class MenuController extends Controller
{

    /**
     * Lists all Menu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

     $source = new Entity('ZeteqPageBundle:Menu');
 

         $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->setLimits(array(10,25,50,100,1000));
        $title= "excel";
        $fileName = "pages.xls";
        $grid->addExport(new ExcelExport($title, $fileName));

        
        $rowActionDelete = new RowAction('delete', 'menu_delete',true);   
        $rowAction = new RowAction('edit', 'menu_edit');

 
        $grid->addRowAction($rowAction);    
        $grid->addRowAction($rowActionDelete);    

        $callback = 'ZeteqPageBundle\MenuController::delete';


        $grid->addMassAction(new DeleteMassAction());
    $grid->hideColumns(array(
        
    'id'));





        $grid->isReadyForRedirect();
        
        




return $grid->getGridResponse('ZeteqPageBundle:Menu:index.html.twig');
    }
    /**
     * Creates a new Menu entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Menu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('menu_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqPageBundle:Menu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Menu entity.
    *
    * @param Menu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Menu $entity)
    {
        $form = $this->createForm(new MenuType(), $entity, array(
            'action' => $this->generateUrl('menu_create'),
            'method' => 'POST',
        ));

         

        return $form;
    }

    /**
     * Displays a form to create a new Menu entity.
     *
     */
    public function newAction()
    {
        $entity = new Menu();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZeteqPageBundle:Menu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Menu entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Menu:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Menu entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZeteqPageBundle:Menu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Menu entity.
    *
    * @param Menu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Menu $entity)
    {
        $form = $this->createForm(new MenuType(), $entity, array(
            'action' => $this->generateUrl('menu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    

        return $form;
    }
    /**
     * Edits an existing Menu entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Menu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('menu_edit', array('id' => $id)));
        }

        return $this->render('ZeteqPageBundle:Menu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Menu entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZeteqPageBundle:Menu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Menu entity.');
            }

            $em->remove($entity);
            $em->flush();
  

        return $this->redirect($this->generateUrl('menu'));
    }

    /**
     * Creates a form to delete a Menu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('menu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
