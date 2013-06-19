<?php

namespace SlotMachine\SlotBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reel
 */
class Reel
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
     * @var integer
     */
    private $undefinedCardResolution;

    /**
     * @var ArrayCollection
     */
    private $cards;

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
     * @return Reel
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
     * Set undefinedCardResolution
     *
     * @param integer $undefinedCardResolution
     * @return Reel
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
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->slots = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add card
     *
     * @param \SlotMachine\SlotBundle\Entity\Card $card
     * @return Reel
     */
    public function addCard(\SlotMachine\SlotBundle\Entity\Card $card)
    {
        $this->cards[] = $card;
    
        return $this;
    }

    /**
     * Remove card
     *
     * @param \SlotMachine\SlotBundle\Entity\Card $card
     */
    public function removeCard(\SlotMachine\SlotBundle\Entity\Card $card)
    {
        $this->cards->removeElement($card);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Add slot
     *
     * @param \SlotMachine\SlotBundle\Entity\Slot $slot
     * @return Reel
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
