<?php

namespace Zeteq\FrontBundle\Controller;
use Zeteq\PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
class FrontController extends Controller
{
    
        public function toggle_front_adminAction()
    {
            $session = $this->get('session');
            $val = $session->get('show_front_admin');
            if($val){
            $session->set('show_front_admin', 0);
            }else{
                 $session->set('show_front_admin', 1);
            }
     
return new JsonResponse(array('val' => $val));
    }
    
    
    
    public function homeAction()
    {
        $site = $this->get('service')->getSite();
        if(!$site)
        {
            $this->redirect($this->generateUrl('site_disabled'));
        }
        return $this->render('ZeteqFrontBundle:Front:home.html.twig');
    }
    public function site_disabled(){
        
                return $this->render('ZeteqFrontBundle:Front:site_disabled.html.twig');
    }
    
//      
//        public function contactAction(Request $request) 
//        {
//
//
//        $defaultData = array('message' => 'Type your message here');
//        $form = $this->createFormBuilder($defaultData)
//                ->add('your_name', 'text')
//                ->add('your_email', 'email')
//                ->add('your_question', 'textarea')
//                ->getForm();
//        
//        if ($request->isMethod('POST')) {
//            $form->bind($request);
//
//            // data is an array with "name", "email", and "message" keys
//            $data = $form->getData();
//            $message = \Swift_Message::newInstance()
//                    ->setSubject('Contact form received ')
//                    ->setFrom($data['your_email'])
//                    ->setTo('zeshaq@gmail.com')
//                    ->setBody(
//                    $this->renderView(
//                            'ZeteqPageBundle:Default:contact_us_email.html.twig', array('data' => $data)
//                    ),'text/html'
//                    )
//            ;
//            $this->get('mailer')->send($message);
//            return $this->render('ZeteqFrontBundle:Front:contact_us_thankyou.html.twig');
//        }
//        return $this->render('ZeteqFrontBundle:Front:contact_us_form.html.twig', array(
//                    'form' => $form->createView(),));
//    }
    
    
    //route contact
    
         public function contactAction(Request $request) 
        {


        
        if ($request->isMethod('POST')) {
            
            
            $data = $request->request->get('contact');

            $web = $this->get('service')->getSite()->getUrl();
            $email = $this->get('service')->getSite()->getEmail();
$email_name = $this->get('service')->getSite()->getEmailName();
$site_name = $this->get('service')->getSite()->getName();  


 
            $message = \Swift_Message::newInstance()
                    ->setSubject('Contact Form Receieved ')
                    ->setFrom(array($email => 'Contact Form'))
                    ->setTo($email)
                    ->setBody(
                    $this->renderView(
                            'ZeteqFrontBundle:Front:contact_us_email.html.twig', array('site_name'=>$site_name, 'web'=>$web,  'data' => $data)
                    ),'text/html'
                    )
            ;
            $this->get('mailer')->send($message);
            
            


return new JsonResponse("Thank you very much for contacting us. We will get back to you asap");



        }
        return $this->render('ZeteqFrontBundle:Front:contact_us_form.html.twig'
                
                );
    }
    
        
        public function page_showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Page')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        
                if (!$entity->getEnabled()) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

   $page_file = "ZeteqFrontBundle:Pages:".$entity->getId().".html.twig";
   if($entity->getTemplate() != ""){
$template = 'ZeteqFrontBundle:Front:'.$entity->getTemplate().'.html.twig';
   }else{
       
    $template = 'ZeteqFrontBundle:Front:page_show.html.twig';   
   }       

return $this->render($template, array(
            'entity'      => $entity,
             'page_file' =>$page_file
                  ));
    }
    
    
    
            
        public function page_editorAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Page')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }


       
    $template = 'ZeteqFrontBundle:Front:page_editor.html.twig';   
          $page_file = "ZeteqFrontBundle:Pages:".$entity->getId().".html.twig";

return $this->render($template, array(
            'entity'      => $entity,
             'page_file' =>$page_file
                  ));
    }
    
    
         public function page_editor_saveAction($slug,Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqPageBundle:Page')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        
        $body = $request->request->get('body');
        $entity->setBody($body);
        $em->flush();
        
        
                    
            //create a backup
            
            //create a backup
    $backup_path = dirname($this->get('kernel')->getRootDir()) . '/backups/pages/'.$entity->getId();
       
    if(!file_exists($backup_path)){
        mkdir($backup_path);
    }
    $backup_file = $backup_path.'/backup_'.date('Y_M-d_h_i').'.html.twig';
    $file_content_b = $entity->getBody();
        $fhb = fopen($backup_file, 'w');
        $val = fwrite($fhb, $file_content_b);
        fclose($fhb);
            
            
            
            
            
          $path = $this->get('kernel')->getRootDir() . '../../src/Zeteq/FrontBundle/Resources/views/Pages/'.$entity->getId().'.html.twig';
 $file_content = $entity->getBody();
        $fh = fopen($path, 'w');
        $val2 = fwrite($fh, $file_content);
        fclose($fh);
        
        
        


  return $this->redirect($this->generateUrl('page_editor',array('slug'=>$entity->getSlug())));
    }
    
    
    
    
    
    
    
       
            
        public function blogpost_editorAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPost')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }


       
    $template = 'ZeteqFrontBundle:Front:blogpost_editor.html.twig';   


return $this->render($template, array(
            'entity'      => $entity,
 
                  ));
    }
    
    
         public function blogpost_editor_saveAction($slug,Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPost')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        
        $body = $request->request->get('body');
        $entity->setBody($body);
        $em->flush();
        
        


  return $this->redirect($this->generateUrl('blogpost_editor',array('slug'=>$entity->getSlug())));
    }
    
    
    
    
}
