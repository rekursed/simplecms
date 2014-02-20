<?php 


namespace Zeteq\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="category")
  */


class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


  
    
    /**
     * @ORM\Column(type="string",length=228, nullable=false)
     */
    protected $name;

    
        /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true, nullable=true)
     */
    private $slug;  
    
    
    

   /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $enabled;


    
    
        
    
        /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    
    
    
    
       /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="category",cascade={"remove"})
     */
    protected $pages;
    
    
    public function __toString() {
        return $this->name;
    }
    
        public function getEnabledPages()
    {
        
        


$pages = $this->getPages();

$criteria = Criteria::create()
    ->where(Criteria::expr()->eq("enabled", "1"))
    ->andWhere(Criteria::expr()->neq("is_homepage", "1"))
        ->orderBy(array("sort" => Criteria::DESC))
 //   ->setFirstResult(0)
  //  ->setMaxResults(20)
;

$enabled_pages = $pages->matching($criteria);
return $enabled_pages;
        
        
    }
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Category
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
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Category
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Add pages
     *
     * @param \Zeteq\PageBundle\Entity\Page $pages
     * @return Category
     */
    public function addPage(\Zeteq\PageBundle\Entity\Page $pages)
    {
        $this->pages[] = $pages;
    
        return $this;
    }

    /**
     * Remove pages
     *
     * @param \Zeteq\PageBundle\Entity\Page $pages
     */
    public function removePage(\Zeteq\PageBundle\Entity\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add children
     *
     * @param \Zeteq\PageBundle\Entity\Category $children
     * @return Category
     */
    public function addChildren(\Zeteq\PageBundle\Entity\Category $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Zeteq\PageBundle\Entity\Category $children
     */
    public function removeChildren(\Zeteq\PageBundle\Entity\Category $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Zeteq\PageBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\Zeteq\PageBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Zeteq\PageBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }
}