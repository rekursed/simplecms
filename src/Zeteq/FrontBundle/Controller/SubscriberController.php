<?php

namespace Zeteq\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Zeteq\PageBundle\Entity\Subscriber;
use Zeteq\PageBundle\Form\SubscriberType;

/**
 * Subscriber controller.
 *
 */
class SubscriberController extends Controller {

    public function subscribeAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $email = $request->request->get('email');

        $ex = $em->getRepository('ZeteqPageBundle:Subscriber')->findOneByEmail($email);

        if ($ex) {

            return new JsonResponse('The email already exists in our database');
        } else {
            $subscriber = new Subscriber();
            $subscriber->setEmail($email);



            $em->persist($subscriber);
            $em->flush();

            return new JsonResponse('Thank you. Your email has been successfully subscribed');
        }
    }

    public function createAction(Request $request) {
        $entity = new Subscriber();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subscriber_edit', array('id' => $entity->getId())));
        }

        return $this->render('ZeteqFrontBundle:Subscriber:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Subscriber entity.
     *
     * @param Subscriber $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Subscriber $entity) {
        $form = $this->createForm(new SubscriberType(), $entity, array(
            'action' => $this->generateUrl('subscriber_front_create'),
            'method' => 'POST',
        ));



        return $form;
    }

    /**
     * Displays a form to create a new Subscriber entity.
     *
     */
    public function newAction() {
        $entity = new Subscriber();
        $form = $this->createCreateForm($entity);

        return $this->render('ZeteqFrontBundle:Subscriber:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Deletes a Subscriber entity.
     *
     */
    public function deleteAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ZeteqPageBundle:Subscriber')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subscriber entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('subscriber'));
    }

}
