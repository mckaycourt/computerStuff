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

    $stmt = $conn->prepare("SELECT User_ID, FirstName, LastName, Username, email, Password FROM User WHERE Username = ?;");
    $options = [
        'cost' => 12,
    ];

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userID, $firstName, $lastName, $username, $email, $hashed_password);
        while ($stmt->fetch()) {
            if(password_verify($password, $hashed_password)){
                $user = new User($userID, $firstName, $lastName, $username, $email, 0, "", "");
                session_start();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['firstName'] = $user->getFirstName();
                $_SESSION['lastName'] = $user->getLastName();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['address'] = $user->getAddress();
                $stmt->close();
                $stmt = $conn->prepare("SELECT Permissions FROM Employee WHERE User_ID = ?;");
                $stmt->bind_param("s", $userID);
                $stmt->execute();
                $stmt->bind_result($permissions);
                while($stmt->fetch()){
                    $_SESSION['permissions'] = $permissions;
                }
            }

        }


    $conn->close();
    header('location: home.php');
}