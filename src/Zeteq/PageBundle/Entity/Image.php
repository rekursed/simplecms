<?php 


namespace Zeteq\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 * @ORM\HasLifecycleCallbacks 
 */


class Image
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
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $enabled;


     
     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $body;
    
    /**
     * @ORM\ManyToMany(targetEntity="Gallery",mappedBy="images")
     *
     */
    protected $gallerys;
  


    //////////image uploading begin
    
    

 /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $image_path;
    
    /**
     * @var string $image
     * @Assert\File( maxSize = "5024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $image;
    
    
public function getWebPath() 
{
        return  'upload/images/'. $this->image_path;
}
    

public function getFullImagePath() 
{
return   $this->getUploadRootDir(). $this->image_path;
}
 
protected function getUploadRootDir() 
{
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/images/';
}
 


   /**
     * @ORM\PrePersist()
     */
    public function uploadpersistImage() 
{
        // the file property can be empty if the field is not required
        if (null === $this->image) {
            return;
		}

        
        $this->image->move($this->getUploadRootDir(),$this->image->getClientOriginalName());

        $this->setImagePath($this->image->getClientOriginalName());
         $this->setImage('');
    }
 
    
       /**
     * @ORM\PreUpdate()
     */
    
    public function uploadupdateImage() {

            if (null === $this->image) {
            return;
        }
        
       $this->image->move($this->getUploadRootDir(), $this->image->getClientOriginalName());
       $this->setImagePath($this->image->getClientOriginalName());
         $this->setImage('');
        
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeImage()
    {
        try{
       unlink($this->getFullImagePath());
        }catch(\Exception $e){
            
        }
    }



    
    /////////image uploading end
   

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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * Set image_path
     *
     * @param string $imagePath
     * @return Image
     */
    public function setImagePath($imagePath)
    {
        $this->image_path = $imagePath;
    
        return $this;
    }

    /**
     * Get image_path
     *
     * @return string 
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Image
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gallerys = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add gallerys
     *
     * @param \Zeteq\PageBundle\Entity\Gallery $gallerys
     * @return Image
     */
    public function addGallery(\Zeteq\PageBundle\Entity\Gallery $gallerys)
    {
        $this->gallerys[] = $gallerys;
    
        return $this;
    }

    /**
     * Remove gallerys
     *
     * @param \Zeteq\PageBundle\Entity\Gallery $gallerys
     */
    public function removeGallery(\Zeteq\PageBundle\Entity\Gallery $gallerys)
    {
        $this->gallerys->removeElement($gallerys);
    }

    /**
     * Get gallerys
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGallerys()
    {
        return $this->gallerys;
    }
}