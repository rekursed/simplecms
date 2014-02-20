<?php 


namespace Zeteq\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="page")
  */


class Page
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


        /**
     * @ORM\Column(type="string",length=800, nullable=false)
     */
    protected $title;    

    
        /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true, nullable=true)
     */
    private $slug;  
    
    
   /**
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $sort;
    
    
    
   /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $is_homepage;
    
    

   /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $enabled;

        /**
     * @ORM\Column(type="string",length=100, nullable=true)
     */
    protected $template;    
     
        /**
     * @ORM\Column(type="string",length=100, nullable=true)
     */
    protected $layout;    
    
    
     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $body;
    
          
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="pages")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id",nullable=true)
     * 
     */
    protected $category;
  

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
     * @return Page
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
     * Set enabled
     *
     * @param boolean $enabled
     * @return Page
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
     * Set body
     *
     * @param string $body
     * @return Page
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
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
     * Set category
     *
     * @param \Zeteq\PageBundle\Entity\Category $category
     * @return Page
     */
    public function setCategory(\Zeteq\PageBundle\Entity\Category $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Zeteq\PageBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set is_homepage
     *
     * @param boolean $isHomepage
     * @return Page
     */
    public function setIsHomepage($isHomepage)
    {
        $this->is_homepage = $isHomepage;
    
        return $this;
    }

    /**
     * Get is_homepage
     *
     * @return boolean 
     */
    public function getIsHomepage()
    {
        return $this->is_homepage;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     * @return Page
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
     * Set layout
     *
     * @param string $layout
     * @return Page
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    
        return $this;
    }

    /**
     * Get layout
     *
     * @return string 
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Set template
     *
     * @param string $template
     * @return Page
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }
}