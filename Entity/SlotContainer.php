<?php

namespace SlotMachine\SlotBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * SlotContainer
 */
class SlotContainer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $delimiter;

    /**
     * @var integer
     */
    private $undefinedCardResolution;

    /**
     * @var ArrayCollection
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
