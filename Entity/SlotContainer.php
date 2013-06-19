<?php

namespace SlotMachine\SlotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SlotContainer
 *
 * @ORM\Table("slotcontainer")
 * @ORM\Entity(repositoryClass="SlotMachine\SlotBundle\Entity\SlotContainerRepository")
 */
class SlotContainer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="delimiter", type="string", length=16)
     */
    private $delimiter;

    /**
     * @var integer
     *
     * @ORM\Column(name="undefined_card_resolution", type="integer")
     */
    private $undefinedCardResolution;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Slot", mappedBy="container")
     */
    private $slots;

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
     * @return SlotContainer
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
     * Set delimiter
     *
     * @param string $delimiter
     * @return SlotContainer
     */
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    
        return $this;
    }

    /**
     * Get delimiter
     *
     * @return string 
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /**
     * Set undefinedCardResolution
     *
     * @param integer $undefinedCardResolution
     * @return SlotContainer
     */
    public function setUndefinedCardResolution($undefinedCardResolution)
    {
        $this->undefinedCardResolution = $undefinedCardResolution;
    
        return $this;
    }

    /**
     * Get undefinedCardResolution
     *
     * @return integer 
     */
    public function getUndefinedCardResolution()
    {
        return $this->undefinedCardResolution;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slots = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add slot
     *
     * @param \SlotMachine\SlotBundle\Entity\Slot $slot
     * @return SlotContainer
     */
    public function addSlot(\SlotMachine\SlotBundle\Entity\Slot $slot)
    {
        $this->slots[] = $slot;
    
        return $this;
    }

    /**
     * Remove slot
     *
     * @param \SlotMachine\SlotBundle\Entity\Slot $slot
     */
    public function removeSlot(\SlotMachine\SlotBundle\Entity\Slot $slot)
    {
        $this->slots->removeElement($slot);
    }

    /**
     * Get slots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlots()
    {
        return $this->slots;
    }
}
