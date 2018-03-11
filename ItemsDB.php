<?php include('Item.php'); ?>
<?php include('credentialsTest.php');?>
<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/5/18
 * Time: 9:32 PM
 */
class ItemsDB extends credentialsTest
{
    private $items;

    function __construct()
    {
        $this->items = null;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        if($this->items == null){
            $conn = new mysqli($this->getServername(), $this->getUsername(), $this->getPassword(), $this->getDbname());
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Item";
            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $item = new Item($row["Item_ID"], $row["ID"], $row["name"]);
                    array_push($arr, $item);
                }

            } else {
                echo "0 results";
            }
            $conn->close();
            return $arr;
        }
        else{
            return $this->items;
        }
    }

    /**
     * @param mixed $customers
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

}