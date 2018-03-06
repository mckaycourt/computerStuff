<?php include('Item.php'); ?>
<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/5/18
 * Time: 9:32 PM
 */
class Items
{
    private $items;
    private $servername = "localhost";
    private $username = "testUser";
    private $password = "Testing123";
    private $dbname = "it350";

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
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
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
            return $this->item;
        }
    }

    /**
     * @param mixed $customers
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    public function insertItem($ID, $name){

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Item (ID, name) VALUES (?, ?)");
        $stmt->bind_param("sss", $ID, $name);


        echo $ID." ".$name;

        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

}