<?php

namespace Zeteq\PageBundle\Controller;
use Zeteq\PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZeteqPageBundle:Default:index.html.twig');
    }



    
    
  
    
    
    }
