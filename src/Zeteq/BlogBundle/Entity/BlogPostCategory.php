<?php 


namespace Zeteq\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog_post_category")
  */


class BlogPostCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


  
    
    /**
     * @ORM\Column(type="string",length=128, nullable=false)
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
    protected $enabled= true;
    
    
    
        /**
     * @ORM\OneToMany(targetEntity="BlogPostCategory", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="BlogPostCategory", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    
    
    
    
    
    
    


       /**
     * @ORM\OneToMany(targetEntity="BlogPost", mappedBy="category",cascade={"remove"})
     */
    protected $blog_posts;
    
    public function __toString() {
        return $this->name;
    }


    public function getEnabledBlogPosts()
    {
        
        


$pages = $this->getBlogPosts();

$criteria = Criteria::create()
    ->where(Criteria::expr()->eq("enabled", "1"))
        ->orderBy(array("sort" => Criteria::DESC));

$enabled_pages = $pages->matching($criteria);
return $enabled_pages;
        
        
    }
    
    
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blog_posts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return BlogPostCategory
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
     * @return BlogPostCategory
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
     * @return BlogPostCategory
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
     * Add blog_posts
     *
     * @param \Zeteq\BlogBundle\Entity\BlogPost $blogPosts
     * @return BlogPostCategory
     */
    public function addBlogPost(\Zeteq\BlogBundle\Entity\BlogPost $blogPosts)
    {
        $this->blog_posts[] = $blogPosts;
    
        return $this;
    }

    /**
     * Remove blog_posts
     *
     * @param \Zeteq\BlogBundle\Entity\BlogPost $blogPosts
     */
    public function removeBlogPost(\Zeteq\BlogBundle\Entity\BlogPost $blogPosts)
    {
        $this->blog_posts->removeElement($blogPosts);
    }

    /**
     * Get blog_posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogPosts()
    {
        return $this->blog_posts;
    }

    /**
     * Add children
     *
     * @param \Zeteq\BlogBundle\Entity\BlogPostCategory $children
     * @return BlogPostCategory
     */
    public function addChildren(\Zeteq\BlogBundle\Entity\BlogPostCategory $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Zeteq\BlogBundle\Entity\BlogPostCategory $children
     */
    public function removeChildren(\Zeteq\BlogBundle\Entity\BlogPostCategory $children)
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
     * @param \Zeteq\BlogBundle\Entity\BlogPostCategory $parent
     * @return BlogPostCategory
     */
    public function setParent(\Zeteq\BlogBundle\Entity\BlogPostCategory $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Zeteq\BlogBundle\Entity\BlogPostCategory 
     */
    public function getParent()
    {
        return $this->parent;
    }
}