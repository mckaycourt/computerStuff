<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/9/18
 * Time: 9:57 PM
 */
class User
{
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $permissions;
    private $address;
    private $creditCard;
    private $userID;

    function __construct($userID, $firstName, $lastName, $userName, $email, $permissions, $address, $creditCard)
    {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $userName;
        $this->email = $email;
        $this->permissions = $permissions;
        $this->address = $address;
        $this->creditCard = $creditCard;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

}