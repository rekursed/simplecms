<?php

namespace Zeteq\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Zeteq\UserBundle\Entity\User;
use Zeteq\UserBundle\Form\UserType;
use Zeteq\UserBundle\Form\RegisterUserType;
use Zeteq\UserBundle\Form\UserChangePasswordType;
 
/**
 * User controller.
 *
 */
class ForgotPasswordController extends Controller
{
    
    
         
    
    
     
    
    
    function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
    
    
    
    
    

         public function forgot_passwordAction(Request $request)
    {
                              
        return $this->render('ZeteqFrontBundle:ForgotPassword:forgot_password.html.twig'                
                );
             
             
    }
    
      public function reset_passwordAction(Request $request)
    {
                 
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ZeteqUserBundle:User')->findOneByEmail($request->request->get('email'));
                 
     if($user)
     {
         $rand_string = $this->randString(15);
         $user->setActivationCode($rand_string);
         $em->persist($user);
         $em->flush();
         
         
                   //send email
         
                     $web = $this->get('service')->getSite()->getUrl();
            $email = $this->get('service')->getSite()->getEmail();
$email_name = $this->get('service')->getSite()->getEmailName();
$site_name = $this->get('service')->getSite()->getName();  
         
         
            
             $message = \Swift_Message::newInstance()
                    ->setSubject('Reset Password ')
 
                
                      ->setFrom(array($email => $email_name))
                     ->setTo($user->getEmail())
                    ->setBody(
                    $this->renderView(
                            'ZeteqUserBundle:ForgotPassword:reset_password_email.html.twig', 
                            
                            array(
                                'web' =>$web,
                                'user'=>$user , 'rand_string' => $rand_string,'ip'=>   $this->container->get('request')->getClientIp()  )
                   
                    ),'text/html'
                    )
            ;
            $this->get('mailer')->send($message);
            //end send email
         
         
         
         
         $template = "reset_password";
        return $this->render('ZeteqFrontBundle:ForgotPassword:reset_password.html.twig'                
                );
             
     }
     else
     {
         $error = 1; 
         
      
      return $this->redirect($this->generateUrl('forgot_password',array('error'=>$error)));
     }
    }
    
    
      public function reset_password_linkAction(Request $request,$tmp)
    {
                
                 
                 
     $em = $this->getDoctrine()->getManager();
     $dql = "SELECT a FROM ZeteqUserBundle:User a WHERE a.activation_code=:rand_string";

        $query = $em->createQuery($dql);
        $query->setParameter('rand_string', $tmp);
        $entity= $query->getOneOrNullResult();        
                 
                if($entity)
                    
                {
                    
                    $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
        ->add('password', 'repeated', array(
            'type'=>"password",
                'invalid_message' => 'The password fields must match.',
    'required' => true,
            
    'first_options'  => array('label' => 'Password'),
    'second_options' => array('label' => 'Repeat Password'),
))
                ->getForm();
        
        
                 if ($request->isMethod('POST')) {
            $form->bind($request);

            
            if($form->isValid()){

            $data = $form->getData();
            
            


           
            
$factory = $this->get('security.encoder_factory');
$encoder = $factory->getEncoder($entity);
$password = $encoder->encodePassword($data['password'], $entity->getSalt());
$entity->setPassword($password);    

         $rand_string = $this->randString(15);
         $entity->setActivationCode($rand_string);
         
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($entity);
                 $em->flush();
            

            return $this->render('ZeteqFrontBundle:ForgotPassword:reset_password_link_successful.html.twig',
            array('tmp'=>$tmp,'form'=>$form->createView())
                    );
         }
         
            }
        
        
       
        
        
        
        
                 $template = "reset_password_link";
        return $this->render('ZeteqFrontBundle:ForgotPassword:reset_password_link.html.twig',
                
                array('tmp'=>$tmp,'form'=>$form->createView())
                );     
                }
                 
                 else{
                     
                     
                     
                     
               
        return $this->render('ZeteqFrontBundle:ForgotPassword:reset_password_link_not_found.html.twig'
  
                );     
                     
                 }
                 
                 
                   
  
    }
    
    
 
    
    }
