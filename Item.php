<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/5/18
 * Time: 9:26 PM
 */
class Item
{

    private $Item_ID;
    private $ID;
    private $name;

    function __construct($Item_ID, $ID, $name)
    {

        $this->Item_ID = $Item_ID;
        $this->ID = $ID;
        $this->name = $name;

    }

    /**
     * @return mixed
     */
    public function getItemID()
    {
        return $this->Item_ID;
    }

    /**
     * @param mixed $Item_ID
     */
    public function setItemID($Item_ID)
    {
        $this->Item_ID = $Item_ID;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}