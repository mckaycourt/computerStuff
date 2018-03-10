<?php include('credentialsTest.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/9/18
 * Time: 11:28 PM
 */

$credentials = new credentialsTest();

$username = isset($_GET['username']) ? $_GET['username'] : null;
$password = isset($_GET['password']) ? $_GET['password'] : null;

if ($username != null && $password != null) {

    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO Customer (Username, Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->close();
    header("location: getUser.php?username=".$username."&password=".$password);
}

