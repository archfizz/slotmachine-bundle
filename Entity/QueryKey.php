<?php

namespace SlotMachine\SlotBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * QueryKey
 */
class QueryKey
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
     * @return QueryKey
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
     * @return QueryKey
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
