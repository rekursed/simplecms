<?php

namespace Zeteq\BlogBundle\Controller;
use Zeteq\BlogBundle\Entity\BlogPost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
         $em = $this->getDoctrine()->getManager();
         
         
            $repo = $em->getRepository('ZeteqBlogBundle:BlogPost');
                  
            
            $query= $repo->createQueryBuilder('a')
                ->where('a.enabled=1')
                ->getQuery();
                    

       

        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $this->get('request')->query->get('page', 1)/* page number */, 10/* limit per page */
        );                    
                    
                    
                    return $this->render('ZeteqFrontBundle:Blog:home.html.twig',array('pagination'=>$pagination));
    }
    
    
        public function blogpost_showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPost')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogPost entity.');
        }

  

        return $this->render('ZeteqFrontBundle:Blog:blogpost_show.html.twig', array(
            'entity'      => $entity,
             ));
    }
    
    
        public function blogpostcategory_showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZeteqBlogBundle:BlogPostCategory')->findOneBySlug($slug);
        
        
                    $repo = $em->getRepository('ZeteqBlogBundle:BlogPost');
                  
            
            $query= $repo->createQueryBuilder('a')
                ->where('a.enabled=1')
                    ->andWhere('a.category=:id')
                ->setParameter('id',$entity->getId())
                ->getQuery();
            
            
                    $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $this->get('request')->query->get('page', 1)/* page number */, 10/* limit per page */
        ); 
        
        


        return $this->render('ZeteqFrontBundle:Blog:blogpostcategory_show.html.twig', array(
            'pagination'      => $pagination,
            'entity'   =>$entity
            ));
    }
    
    
        public function blog_searchAction(Request $request) {
            
            
            
        $search = $request->query->get('search');
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
                ->getRepository('ZeteqBlogBundle:BlogPost');
        $query = $repository->createQueryBuilder('p')
                ->where('p.body LIKE :content')
                ->orWhere('p.title LIKE :title')
                ->setParameter('content', '%' . $search . '%')
                ->setParameter('title', '%' . $search . '%')
                ->getQuery();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $this->get('request')->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        return $this->render('ZeteqFrontBundle:Blog:blog_search.html.twig', array(
                    'pagination' => $pagination,
                ));
    }
}


