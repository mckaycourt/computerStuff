<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 6:07 PM
 */
class Computer
{
    private $Computer_ID;
    private $Name;
    private $Hard_Drive;
    private $Ram;
    private $GPU;
    private $Screen_Size;
    private $CPU;
    private $Type;
    private $Price;
    private $Picture;

    function __construct($Computer_ID, $Name, $Hard_Drive, $Ram, $GPU, $Screen_Size, $CPU, $Type, $Price, $Picture)
    {
        $this->Computer_ID = $Computer_ID;
        $this->Name = $Name;
        $this->Hard_Drive = $Hard_Drive;
        $this->Ram = $Ram;
        $this->GPU = $GPU;
        $this->Screen_Size = $Screen_Size;
        $this->CPU = $CPU;
        $this->Type = $Type;
        $this->Price = $Price;
        $this->Picture = $Picture;
    }

    /**
     * @return mixed
     */
    public function getComputerID()
    {
        return $this->Computer_ID;
    }

    /**
     * @param mixed $Computer_ID
     */
    public function setComputerID($Computer_ID)
    {
        $this->Computer_ID = $Computer_ID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Hame
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getHardDrive()
    {
        return $this->Hard_Drive;
    }

    /**
     * @param mixed $Hard_Drive
     */
    public function setHardDrive($Hard_Drive)
    {
        $this->Hard_Drive = $Hard_Drive;
    }

    /**
     * @return mixed
     */
    public function getRam()
    {
        return $this->Ram;
    }

    /**
     * @param mixed $Ram
     */
    public function setRam($Ram)
    {
        $this->Ram = $Ram;
    }

    /**
     * @return mixed
     */
    public function getGPU()
    {
        return $this->GPU;
    }

    /**
     * @param mixed $GPU
     */
    public function setGPU($GPU)
    {
        $this->GPU = $GPU;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type)
    {
        $this->Type = $Type;
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

    /**
     * @return mixed
     */
    public function getScreenSize()
    {
        return $this->Screen_Size;
    }

    /**
     * @param mixed $Screen_Size
     */
    public function setScreenSize($Screen_Size)
    {
        $this->Screen_Size = $Screen_Size;
    }

    /**
     * @return mixed
     */
    public function getCPU()
    {
        return $this->CPU;
    }

    /**
     * @param mixed $CPU
     */
    public function setCPU($CPU)
    {
        $this->CPU = $CPU;
    }

}