<?php include('credentialsTest.php'); ?>
<?php include('loginCheck.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/5/18
 * Time: 10:01 PM
 */
$credentials = new credentialsTest();
$ID = isset($_GET['id']) ? $_GET['id'] : null;
$name = isset($_GET['name']) ? $_GET['name'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;

if ($type == "delete" && $ID != null) {
    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM Item WHERE Item_ID = ?");
    $stmt->bind_param("s", $ID);
    $stmt->execute();
    $stmt->close();
    header('location: Items.php');
} else if ($type == "insert") {

    if ($ID != null && $name != null) {
        $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Item (ID, name) VALUES (?, ?)");
        $stmt->bind_param("ss", $ID, $name);
        $stmt->execute();
        $stmt->close();


        $sql = "SELECT LAST_INSERT_ID();";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["LAST_INSERT_ID()"];
            }

        } else {
            echo "0 results";
        }
        $conn->close();
    header('location: Items.php');

    }
}