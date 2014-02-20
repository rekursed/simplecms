<?php 


namespace Zeteq\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="link")
 * @ORM\HasLifecycleCallbacks 
 */


class Link
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=128, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string",length=128, nullable=true)
     */
    protected $target;


    /**
     * @ORM\Column(type="string",length=128, nullable=true)
     */
    protected $href;


       
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $sort;

    
    /**
     * @ORM\ManyToMany(targetEntity="Menu",mappedBy="links")
     *
     */
    protected $menu;
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menu = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Link
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set target
     *
     * @param string $target
     * @return Link
     */
    public function setTarget($target)
    {
        $this->target = $target;
    
        return $this;
    }

    /**
     * Get target
     *
     * @return string 
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set href
     *
     * @param string $href
     * @return Link
     */
    public function setHref($href)
    {
        $this->href = $href;
    
        return $this;
    }

    /**
     * Get href
     *
     * @return string 
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     * @return Link
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    
        return $this;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Add menu
     *
     * @param \Zeteq\PageBundle\Entity\Menu $menu
     * @return Link
     */
    public function addMenu(\Zeteq\PageBundle\Entity\Menu $menu)
    {
        $this->menu[] = $menu;
    
        return $this;
    }

    /**
     * Remove menu
     *
     * @param \Zeteq\PageBundle\Entity\Menu $menu
     */
    public function removeMenu(\Zeteq\PageBundle\Entity\Menu $menu)
    {
        $this->menu->removeElement($menu);
    }

    /**
     * Get menu
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMenu()
    {
        return $this->menu;
    }
}