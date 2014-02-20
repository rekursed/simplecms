<?php

namespace Zeteq\BlogBundle\Extensions;

use Doctrine\ORM\EntityManager;
use Zeteq\BlogBundle\Entity\BlogPost;
use Zeteq\BlogBundle\Entity\BlogPostCategory;

class Blog {

    protected $em;

    function __construct(EntityManager $em) 
    {

        $this->em = $em;
    }
    

        public function getParentCategories() {
        try {

            $query = $this->em->createQuery('SELECT a from ZeteqBlogBundle:BlogPostCategory a where a.enabled=1 and a.parent is NULL ');
            $as = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $as = false;
        }

        return $as;
    }
    
    
    
    public function getCategories() {
        try {

            $query = $this->em->createQuery('SELECT a from ZeteqBlogBundle:BlogPostCategory a where a.enabled=1 ');
            $as = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $as = false;
        }

        return $as;
    }
    

   
   
}
