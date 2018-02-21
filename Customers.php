<?php include('Customer.php'); ?>

<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 2/20/18
 * Time: 5:59 PM
 */

class Customers
{
    private $customers;
    private $servername = "localhost";
    private $username = "root";
    private $password = "Mlhlt2200!";
    private $dbname = "testDB";

    function __construct()
    {
        $this->customers = null;

    }

    /**
     * @return mixed
     */
    public function getCustomers()
    {
        if($this->customers == null){
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM customer";
            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $customer = new Customer($row["id"], $row["name"], $row["email"], $row["registration_date"]);
                    array_push($arr, $customer);
                }

            } else {
                echo "0 results";
            }
            $conn->close();
            return $arr;
        }
        else{
            return $this->customers;
        }
    }

    /**
     * @param mixed $customers
     */
    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }

}