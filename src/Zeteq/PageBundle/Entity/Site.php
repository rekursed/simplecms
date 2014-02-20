<?php 


namespace Zeteq\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="site")
 * @ORM\HasLifecycleCallbacks 
 */


class Site
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


        /**
     * @ORM\Column(type="string",length=100, nullable=false)
     */
    protected $title;    

       /**
     * @ORM\Column(type="string",length=300, nullable=true)
     */
    protected $slogan;
    
    /**
     * @ORM\Column(type="string",length=120, nullable=true)
     */
    protected $name;

        /**
     * @ORM\Column(type="string",length=100, nullable=true)
     */
    protected $url;
           /**
     * @ORM\Column(type="string",length=100, nullable=true)
     */
    protected $email; 
    
               /**
     * @ORM\Column(type="string",length=100, nullable=true)
     */
    protected $email_name; 
    
    
        /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true, nullable=true)
     */
    private $slug;  
    
    

   /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $main;    

   /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $enabled;


     
     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $google_analytics;
    
     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $meta_description;
  
     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $meta_keywords;

     /**
     * @ORM\Column(type="string",length=100,  nullable=true)
     */
    protected $meta_copyright;

     /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $meta_application;


     /**
     * @ORM\Column(type="string",length=300,  nullable=true)
     */
    protected $facebook_title;

     /**
     * @ORM\Column(type="string",length=100,  nullable=true)
     */
    protected $facebook_type;

     /**
     * @ORM\Column(type="string",length=200,  nullable=true)
     */
    protected $facebook_image;

     /**
     * @ORM\Column(type="string",length=300,  nullable=true)
     */
    protected $facebook_url;

     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $facebook_description;

     /**
     * @ORM\Column(type="text",  nullable=true)
     */
    protected $facebook_app_id;




    //////////image uploading begin
    
    

 /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    protected $favicon_path;
    
    /**
     * @var string $favicon
     * @Assert\File( maxSize = "5024k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $favicon;
    
    
public function getFaviconWebPath() 
{
        return  'upload/images/'. $this->favicon_path;
}
    

public function getFullFaviconPath() 
{
return   $this->getUploadRootDir(). $this->favicon_path;
}
 
protected function getUploadRootDir() 
{
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../public_html/upload/images/';
}
 


   /**
     * @ORM\PrePersist()
     */
    public function uploadpersistFavicon() 
{
        // the file property can be empty if the field is not required
        if (null === $this->favicon) {
            return;
		}

        
        $this->favicon->move($this->getUploadRootDir(),$this->favicon->getClientOriginalName());

        $this->setFaviconPath($this->favicon->getClientOriginalName());
         $this->setFavicon('');
    }
 
    
       /**
     * @ORM\PreUpdate()
     */
    
    public function uploadupdateFavicon() {

            if (null === $this->favicon) {
            return;
        }
        
       $this->favicon->move($this->getUploadRootDir(), $this->favicon->getClientOriginalName());
       $this->setFaviconPath($this->favicon->getClientOriginalName());
         $this->setFavicon('');
        
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeFavicon()
    {
        try{
       unlink($this->getFullFaviconPath());
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
     * @return Site
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
     * Set slogan
     *
     * @param string $slogan
     * @return Site
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;
    
        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Site
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
     * @return Site
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
     * @return Site
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
     * Set google_analytics
     *
     * @param string $googleAnalytics
     * @return Site
     */
    public function setGoogleAnalytics($googleAnalytics)
    {
        $this->google_analytics = $googleAnalytics;
    
        return $this;
    }

    /**
     * Get google_analytics
     *
     * @return string 
     */
    public function getGoogleAnalytics()
    {
        return $this->google_analytics;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     * @return Site
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;
    
        return $this;
    }

    /**
     * Get meta_description
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set meta_keywords
     *
     * @param string $metaKeywords
     * @return Site
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get meta_keywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Set meta_copyright
     *
     * @param string $metaCopyright
     * @return Site
     */
    public function setMetaCopyright($metaCopyright)
    {
        $this->meta_copyright = $metaCopyright;
    
        return $this;
    }

    /**
     * Get meta_copyright
     *
     * @return string 
     */
    public function getMetaCopyright()
    {
        return $this->meta_copyright;
    }

    /**
     * Set meta_application
     *
     * @param string $metaApplication
     * @return Site
     */
    public function setMetaApplication($metaApplication)
    {
        $this->meta_application = $metaApplication;
    
        return $this;
    }

    /**
     * Get meta_application
     *
     * @return string 
     */
    public function getMetaApplication()
    {
        return $this->meta_application;
    }

    /**
     * Set facebook_title
     *
     * @param string $facebookTitle
     * @return Site
     */
    public function setFacebookTitle($facebookTitle)
    {
        $this->facebook_title = $facebookTitle;
    
        return $this;
    }

    /**
     * Get facebook_title
     *
     * @return string 
     */
    public function getFacebookTitle()
    {
        return $this->facebook_title;
    }

    /**
     * Set facebook_type
     *
     * @param string $facebookType
     * @return Site
     */
    public function setFacebookType($facebookType)
    {
        $this->facebook_type = $facebookType;
    
        return $this;
    }

    /**
     * Get facebook_type
     *
     * @return string 
     */
    public function getFacebookType()
    {
        return $this->facebook_type;
    }

    /**
     * Set facebook_image
     *
     * @param string $facebookImage
     * @return Site
     */
    public function setFacebookImage($facebookImage)
    {
        $this->facebook_image = $facebookImage;
    
        return $this;
    }

    /**
     * Get facebook_image
     *
     * @return string 
     */
    public function getFacebookImage()
    {
        return $this->facebook_image;
    }

    /**
     * Set facebook_url
     *
     * @param string $facebookUrl
     * @return Site
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebook_url = $facebookUrl;
    
        return $this;
    }

    /**
     * Get facebook_url
     *
     * @return string 
     */
    public function getFacebookUrl()
    {
        return $this->facebook_url;
    }

    /**
     * Set facebook_description
     *
     * @param string $facebookDescription
     * @return Site
     */
    public function setFacebookDescription($facebookDescription)
    {
        $this->facebook_description = $facebookDescription;
    
        return $this;
    }

    /**
     * Get facebook_description
     *
     * @return string 
     */
    public function getFacebookDescription()
    {
        return $this->facebook_description;
    }

    /**
     * Set facebook_app_id
     *
     * @param string $facebookAppId
     * @return Site
     */
    public function setFacebookAppId($facebookAppId)
    {
        $this->facebook_app_id = $facebookAppId;
    
        return $this;
    }

    /**
     * Get facebook_app_id
     *
     * @return string 
     */
    public function getFacebookAppId()
    {
        return $this->facebook_app_id;
    }

    /**
     * Set favicon_path
     *
     * @param string $faviconPath
     * @return Site
     */
    public function setFaviconPath($faviconPath)
    {
        $this->favicon_path = $faviconPath;
    
        return $this;
    }

    /**
     * Get favicon_path
     *
     * @return string 
     */
    public function getFaviconPath()
    {
        return $this->favicon_path;
    }

    /**
     * Set favicon
     *
     * @param string $favicon
     * @return Site
     */
    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;
    
        return $this;
    }

    /**
     * Get favicon
     *
     * @return string 
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Site
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Site
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set main
     *
     * @param boolean $main
     * @return Site
     */
    public function setMain($main)
    {
        $this->main = $main;
    
        return $this;
    }

    /**
     * Get main
     *
     * @return boolean 
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * Set email_name
     *
     * @param string $emailName
     * @return Site
     */
    public function setEmailName($emailName)
    {
        $this->email_name = $emailName;
    
        return $this;
    }

    /**
     * Get email_name
     *
     * @return string 
     */
    public function getEmailName()
    {
        return $this->email_name;
    }
}