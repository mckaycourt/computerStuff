<?php include('User.php'); ?>
<?php include('credentialsTest.php');?>
<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 12:08 PM
 */
class UsersDB extends credentialsTest
{
    private $users;
    function __construct()
    {
        $this->users = null;
    }

    public function getUsersDB(){
        if($this->users == null){
            $conn = new mysqli($this->getServername(), $this->getUsername(), $this->getPassword(), $this->getDbname());
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM User";
            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user = new User($row["User_ID"], $row["FirstName"], $row["LastName"], $row["Username"],$row["email"], null, $row["Address"], null);
                    array_push($arr, $user);
                }

            } else {
                echo "0 results";
            }
            $conn->close();
            $this->users = $arr;
            return $arr;
        }
        else{
            return $this->users;
        }

    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


}