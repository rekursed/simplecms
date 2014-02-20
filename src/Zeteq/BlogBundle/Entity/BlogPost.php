<?php 


namespace Zeteq\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="blog_post")
  */


class BlogPost
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
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;
    
    
    
    
    
    
   /**
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $sort;
    
    
    
 
   /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $enabled;



     /**
     * @ORM\Column(type="text",length=600,  nullable=true)
     */
    protected $overview;

     
     /**
     * @ORM\Column(type="text",  nullable=false)
     */
    protected $body;
    
          
    /**
     * @ORM\ManyToOne(targetEntity="BlogPostCategory", inversedBy="blog_posts")
     * @ORM\JoinColumn(name="blog_post_category_id", referencedColumnName="id",nullable=false)
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
     * Set title
     *
     * @param string $title
     * @return BlogPost
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
     * Set name
     *
     * @param string $name
     * @return BlogPost
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
     * @return BlogPost
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
     * Set sort
     *
     * @param integer $sort
     * @return BlogPost
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
     * Set enabled
     *
     * @param boolean $enabled
     * @return BlogPost
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
     * Set overview
     *
     * @param string $overview
     * @return BlogPost
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;
    
        return $this;
    }

    /**
     * Get overview
     *
     * @return string 
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return BlogPost
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
     * Set category
     *
     * @param \Zeteq\BlogBundle\Entity\BlogPostCategory $category
     * @return BlogPost
     */
    public function setCategory(\Zeteq\BlogBundle\Entity\BlogPostCategory $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Zeteq\BlogBundle\Entity\BlogPostCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return BlogPost
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return BlogPost
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}