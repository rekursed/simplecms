<?php

namespace Zeteq\FrontBundle\Extensions;

use Doctrine\ORM\EntityManager;
use Zeteq\PageBundle\Entity\Page;
use Zeteq\PageBundle\Entity\Gallery;
class Service {

    protected $em;

    function __construct(EntityManager $em) 
    {

        $this->em = $em;
    }
    
    public function getSlot($id) {
//        try {
//
//            $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Slot a where a.id=:id ')
//                    ->setParameter('id',$id);
//            $as = $query->getSingleResult();
//        } catch (\Doctrine\Orm\NoResultException $e) {
//            $as = false;
//        }

        return 'ZeteqFrontBundle:Slots:'.$id.'.html.twig';
    }
    
    public function getSite() {
        try {

            $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Site a where a.main=1 AND a.enabled=1 ');
            $as = $query->getSingleResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $as = false;
        }

        return $as;
    }
    

    public function getEnabledPages() {
        try {

            $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Page a where a.enabled=1 and a.is_homepage != 1');
            $as = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $as = false;
        }

        return $as;
    }
    
    public function getHomeSlideShow(){
         $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Gallery a where a.home_slide =1');
         $gallery = $query->getSingleResult();
         return $gallery;
        
    }
    public function getHomePage(){
         $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Page a where a.is_homepage =1');
         $gallery = $query->getSingleResult();
         return $gallery;
        
    }   
    
    
        public function getGallery($name){
         $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Gallery a where a.name = :name')
                 ->setParameter('name', $name);
         $gallery = $query->getSingleResult();
         return $gallery;
        
    }
    
    
            public function getMenu($name){
         $query = $this->em->createQuery('SELECT a from ZeteqPageBundle:Menu a where a.name = :name')->setParameter('name', $name);
         $gallery = $query->getSingleResult();
         return $gallery;
        
    }
    
    
   
}
