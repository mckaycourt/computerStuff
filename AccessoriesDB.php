<?php include('credentialsTest.php');?>
<?php include('Accessory.php'); ?>

<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 8:03 PM
 */
class AccessoriesDB extends credentialsTest
{
    private $accessories;

    function __construct()
    {
        $this->accessories = null;
    }

    function getAccessoriesDB()
    {

        if ($this->accessories == null) {
            $conn = new mysqli($this->getServername(), $this->getUsername(), $this->getPassword(), $this->getDbname());
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Accessory";
            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $item = new Accessory($row["Accessory_ID"], $row["Name"], $row["System_Requirements"], $row["Price"], $row["Picture"]);
                    array_push($arr, $item);
                }

            } else {
                echo "0 results";
            }
            $conn->close();
            return $arr;
        } else {
            return $this->accessories;
        }
    }

    /**
     * @return null
     */
    public function getAccessories()
    {
        return $this->accessories;
    }

    /**
     * @param null $accessories
     */
    public function setAccessories($accessories)
    {
        $this->accessories = $accessories;
    }

}