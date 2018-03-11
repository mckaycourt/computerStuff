<?php include('credentialsTest.php'); ?>
<?php error_reporting(E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/9/18
 * Time: 11:28 PM
 */

$credentials = new credentialsTest();

$computerID = isset($_GET['computerID']) ? $_GET['computerID'] : null;
$name = isset($_GET['name']) ? $_GET['name'] : null;
$hardDrive = isset($_GET['hardDrive']) ? $_GET['hardDrive'] : null;
$ram = isset($_GET['ram']) ? $_GET['ram'] : null;
$gpu = isset($_GET['gpu']) ? $_GET['gpu'] : null;
$screenSize = isset($_GET['screenSize']) ? $_GET['screenSize'] : null;
$cpu = isset($_GET['cpu']) ? $_GET['cpu'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;
$typeOfComputer = isset($_GET['typeOfComputer']) ? $_GET['typeOfComputer'] : null;

$price = isset($_GET['price']) ? $_GET['price'] : null;
$picture = isset($_GET['picture']) ? $_GET['picture'] : null;

if ($type == "insert") {

    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("INSERT INTO Computer (Name, Hard_Drive, Ram, GPU, Screen_Size, CPU, Type, Price, Picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssss", $name, $hardDrive, $ram, $gpu, $screenSize, $cpu, $typeOfComputer, $price, $picture);
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
    if($id != null){
        header("location: InsertItem.php?id=".$id."&name=".$name."&type=insert");
        echo "id is not null";
    }
    $conn->close();

//    header("location: Computers.php");



} else if ($type == "delete" && $computerID != null) {
    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM Computer WHERE Computer_ID = ?");
    $stmt->bind_param("s", $computerID);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('location: Computers.php');
}

else if($type == "update"){
    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo $typeOfComputer;
    $stmt = $conn->prepare("UPDATE Computer SET Name = ?, Hard_Drive = ?, Ram = ?, GPU = ?, Screen_Size = ?, CPU = ?, Type = ?, Price = ?, Picture = ? WHERE Computer_ID = ?");
    $stmt->bind_param("ssssssssss", $name, $hardDrive, $ram, $gpu, $screenSize, $cpu, $typeOfComputer, $price, $picture, $computerID);
    echo $stmt->error;
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('location: Computers.php');
}