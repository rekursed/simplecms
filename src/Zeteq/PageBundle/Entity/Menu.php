<?php 


namespace Zeteq\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="menu")
  */


class Menu
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


  
    
    /**
     * @ORM\Column(type="string",length=300, nullable=false)
     */
    protected $name;

   

    /**
     * @ORM\ManyToMany(targetEntity="Link", inversedBy="menu" ,cascade={"persist","remove"})
     * @ORM\OrderBy({"sort" = "DESC"})
     */
    protected $links;
   
 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->links = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Menu
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
     * Add links
     *
     * @param \Zeteq\PageBundle\Entity\Link $links
     * @return Menu
     */
    public function addLink(\Zeteq\PageBundle\Entity\Link $links)
    {
        $this->links[] = $links;
    
        return $this;
    }

    /**
     * Remove links
     *
     * @param \Zeteq\PageBundle\Entity\Link $links
     */
    public function removeLink(\Zeteq\PageBundle\Entity\Link $links)
    {
        $this->links->removeElement($links);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLinks()
    {
        return $this->links;
    }
}