<?php

namespace SlotMachine\SlotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reel
 *
 * @ORM\Table("reel")
 * @ORM\Entity(repositoryClass="SlotMachine\SlotBundle\Entity\ReelRepository")
 */
class Reel
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
     * @var integer
     *
     * @ORM\Column(name="undefined_card_resolution", type="integer")
     */
    private $undefinedCardResolution;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Card", mappedBy="reel")
     */
    private $cards;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Slot", inversedBy="reels", cascade={ "persist" })
     * @ORM\JoinTable(name="reel_slot")
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
