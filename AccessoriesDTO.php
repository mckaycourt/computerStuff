<?php include('credentialsTest.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 8:03 PM
 */
$credentials = new credentialsTest();
$name = isset($_GET['name']) ? $_GET['name'] : null;
$systemReqs = isset($_GET['systemReqs']) ? $_GET['systemReqs'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;
$price = isset($_GET['price']) ? $_GET['price'] : null;
$picture = isset($_GET['picture']) ? $_GET['picture'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;


if ($type == "insert") {

    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("INSERT INTO Accessory (Name, System_Requirements, Price, Picture) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $name, $systemReqs, $price, $picture);
    $stmt->execute();
    $stmt->close();
    $sql = "SELECT LAST_INSERT_ID();";

    $id = null;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["LAST_INSERT_ID()"];
        }
        echo $id;
    } else {
        echo "0 results";
    }
    if ($id != null) {
        header("location: InsertItem.php?id=" . $id . "&name=" . $name . "&type=insert");
        echo "id is not null";
    }
    $conn->close();
}

else if($type == "update"){
    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE Accessory SET Name = ?, System_Requirements = ?, Price = ?, Picture = ? WHERE Accessory_ID = ?");
    $stmt->bind_param("sssss", $name, $systemReqs, $price, $picture, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('location: Accessories.php');
}