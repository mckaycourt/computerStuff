<?php include('credentialsTest.php');?>
<?php include('Computer.php'); ?>

<?php

/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 6:15 PM
 */
class ComputersDB extends credentialsTest
{
    private $computers;

    function __construct()
    {
        $computers = null;
    }

    function getComputersDB(){
        if($this->computers == null){
            $conn = new mysqli($this->getServername(), $this->getUsername(), $this->getPassword(), $this->getDbname());
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Computer";
            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $computer = new Computer($row["Computer_ID"], $row["Name"], $row["Hard_Drive"], $row["Ram"], $row["GPU"], $row["Screen_Size"], $row["CPU"], $row["Type"], $row["Price"], $row["Picture"]);
                    array_push($arr, $computer);
                }

            } else {
                echo "0 results";
            }
            $conn->close();
            return $arr;
        }
        else{
            return $this->computers;
        }
    }

    /**
     * @return mixed
     */
    public function getComputers()
    {
        return $this->computers;
    }

    /**
     * @param mixed $computers
     */
    public function setComputers($computers)
    {
        $this->computers = $computers;
    }

}