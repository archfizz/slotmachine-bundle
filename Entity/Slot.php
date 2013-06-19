<?php

namespace SlotMachine\SlotBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Slot
 */
class Slot
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
    private $undefinedCardResolution;

    /**
     * @var ArrayCollection
     */
    private $reels;

    /**
     * @var ArrayCollection
     */
    private $queryKeys;

    /**
     * @var SlotContainer
     */
    private $container;


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
     * @return Slot
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
     * @param string $undefinedCardResolution
     * @return Slot
     */
    public function setUndefinedCardResolution($undefinedCardResolution)
    {
        $this->undefinedCardResolution = $undefinedCardResolution;
    
        return $this;
    }

    /**
     * Get undefinedCardResolution
     *
     * @return string 
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
        $this->reels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->queryKeys = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add reel
     *
     * @param \SlotMachine\SlotBundle\Entity\Reel $reel
     * @return Slot
     */
    public function addReel(\SlotMachine\SlotBundle\Entity\Reel $reel)
    {
        $this->reels[] = $reel;
    
        return $this;
    }

    /**
     * Remove reel
     *
     * @param \SlotMachine\SlotBundle\Entity\Reel $reel
     */
    public function removeReel(\SlotMachine\SlotBundle\Entity\Reel $reel)
    {
        $this->reels->removeElement($reel);
    }

    /**
     * Get reels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReels()
    {
        return $this->reels;
    }

    /**
     * Add query key
     *
     * @param \SlotMachine\SlotBundle\Entity\QueryKey $queryKey
     * @return Slot
     */
    public function addQueryKey(\SlotMachine\SlotBundle\Entity\QueryKey $queryKey)
    {
        $this->queryKeys[] = $queryKey;
    
        return $this;
    }

    /**
     * Remove query key
     *
     * @param \SlotMachine\SlotBundle\Entity\QueryKey $queryKey
     */
    public function removeQueryKey(\SlotMachine\SlotBundle\Entity\QueryKey $queryKey)
    {
        $this->queryKeys->removeElement($queryKey);
    }

    /**
     * Get query keys
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQueryKeys()
    {
        return $this->queryKeys;
    }

    /**
     * Set container
     *
     * @param \SlotMachine\SlotBundle\Entity\SlotContainer $container
     * @return Slot
     */
    public function setContainer(\SlotMachine\SlotBundle\Entity\SlotContainer $container = null)
    {
        $this->container = $container;
    
        return $this;
    }

    /**
     * Get container
     *
     * @return \SlotMachine\SlotBundle\Entity\SlotContainer 
     */
    public function getContainer()
    {
        return $this->container;
    }
}
