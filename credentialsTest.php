<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/7/18
 * Time: 2:10 PM
 */
class credentialsTest
{
    private $servername = "localhost";
    private $username = "testUser";
    private $password = "Testing123!";
    private $dbname = "IT350";

    /**
     * @return string
     */
    public function getServername()
    {
        return $this->servername;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

}