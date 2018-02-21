<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 2/20/18
 * Time: 5:44 PM
 */
class Customer
{
    private $id_;
    private $name_;
    private $email_;
    private $registrationDate_;

    function __construct($id, $name, $email, $regDate)
    {

        $this->id_ = $id;
        $this->name_ = $name;
        $this->email_ = $email;
        $this->registrationDate_ = $regDate;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id_;
    }

    /**
     * @param mixed $id_
     */
    public function setId($id_)
    {
        $this->id_ = $id_;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name_;
    }

    /**
     * @param mixed $name_
     */
    public function setName($name_)
    {
        $this->name_ = $name_;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email_;
    }

    /**
     * @param mixed $email_
     */
    public function setEmail($email_)
    {
        $this->email_ = $email_;
    }

    /**
     * @return mixed
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate_;
    }

    /**
     * @param mixed $registrationDate_
     */
    public function setRegistrationDate($registrationDate_)
    {
        $this->registrationDate_ = $registrationDate_;
    }


}