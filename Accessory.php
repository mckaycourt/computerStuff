<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 8:02 PM
 */
class Accessory
{
    private $Accessory_ID;
    private $Name;
    private $System_Requirements;
    private $Price;
    private $Picture;

    function __construct($Accessory_ID, $Name, $System_Requirements,$Price,$Picture)
    {
        $this->Accessory_ID = $Accessory_ID;
        $this->Name = $Name;
        $this->System_Requirements = $System_Requirements;
        $this->Price = $Price;
        $this->Picture = $Picture;

    }

    /**
     * @return mixed
     */
    public function getAccessoryID()
    {
        return $this->Accessory_ID;
    }

    /**
     * @param mixed $Accessory_ID
     */
    public function setAccessoryID($Accessory_ID)
    {
        $this->Accessory_ID = $Accessory_ID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getSystemRequirements()
    {
        return $this->System_Requirements;
    }

    /**
     * @param mixed $System_Requirements
     */
    public function setSystemRequirements($System_Requirements)
    {
        $this->System_Requirements = $System_Requirements;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param mixed $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->Picture;
    }

    /**
     * @param mixed $Picture
     */
    public function setPicture($Picture)
    {
        $this->Picture = $Picture;
    }

}