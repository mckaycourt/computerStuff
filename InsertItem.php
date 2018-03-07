<?php include('credentialsTest.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/5/18
 * Time: 10:01 PM
 */
$credentials = new credentialsTest();
$ID = isset($_GET['id']) ? $_GET['id'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';

if($ID != "" && $name != '') {
    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo $ID . " " . $name;

    $stmt = $conn->prepare("INSERT INTO Item (ID, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $ID, $name);



    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('location: testDB_customer.php');
}