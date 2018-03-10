<?php include('credentialsTest.php'); ?>
<?php include('User.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/9/18
 * Time: 10:09 PM
 */

$credentials = new credentialsTest();

$username = isset($_GET['username']) ? $_GET['username'] : null;
$password = isset($_GET['password']) ? $_GET['password'] : null;

if($username != null && $password != null) {
    $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT FirstName, LastName, Username, email FROM Customer WHERE Username = ? AND Password = ?;");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($firstName, $lastName, $username, $email);

    $result = $stmt->execute();

        while ($stmt->fetch()) {
//            $user = new User($row["FirstName"], $row["LastName"], $row["Username"], $row["email"], 0, $row["Address"], $row["Credit_Card_ID"]);
            $user = new User($firstName, $lastName, $username, $email, 0, "", "");
            session_start();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['address'] = $user->getAddress();

            echo 'You have entered valid use name and password';
        }


    $conn->close();
    header('location: testDB_customer.php');
}