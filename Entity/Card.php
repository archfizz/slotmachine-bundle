<?php

namespace SlotMachine\SlotBundle\Entity;

/**
 * Card
 */
class Card
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $reelIndex;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var Reel
     */
    private $reel;


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
     * Set reelIndex
     *
     * @param integer $reelIndex
     * @return Card
     */
    public function setReelIndex($reelIndex)
    {
        $this->reelIndex = $reelIndex;
    
        return $this;
    }

    /**
     * Get reelIndex
     *
     * @return integer 
     */
    public function getReelIndex()
    {
        return $this->reelIndex;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Card
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Card
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set reel
     *
     * @param \SlotMachine\SlotBundle\Entity\Reel $reel
     * @return Card
     */
    public function setReel(\SlotMachine\SlotBundle\Entity\Reel $reel = null)
    {
        $this->reel = $reel;
    
        return $this;
    }

    /**
     * Get reel
     *
     * @return \SlotMachine\SlotBundle\Entity\Reel 
     */
    public function getReel()
    {
        return $this->reel;
    }
}
