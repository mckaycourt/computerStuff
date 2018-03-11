<?php include('credentialsTest.php'); ?>
<?php include('loginCheck.php'); ?>

<?php error_reporting( E_ALL ); ?>
<?php ini_set('display_errors', 1);?>
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

    $pattern = '/[A-Z]/';
    if (preg_match($pattern, $password, $matches, PREG_OFFSET_CAPTURE)) {
        $pattern = '/[0-9]/';
        if (preg_match($pattern, $password, $matches, PREG_OFFSET_CAPTURE)) {
            if (strlen($password) > 8) {
                $conn = new mysqli($credentials->getServername(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getDbname());
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $stmt = $conn->prepare("SELECT Username FROM User WHERE Username = ?");

                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->bind_result($database);
                $stmt->store_result();

                if($stmt->num_rows == 0){
                    $stmt->close();
                    $stmt = $conn->prepare("INSERT INTO User (Username, Password) VALUES (?, ?)");
                    $options = [
                        'cost' => 12,
                    ];
                    $password = password_hash($password, PASSWORD_BCRYPT, $options);
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();
                    $stmt->close();
                header("location: getUser.php?username=" . $username . "&password=" . $password);
                }
                else{
                    $stmt->close();
                    echo "username already exists";
                    header("location: newUser.html");
                }
                $conn->close();
            }
        }
    }
//    header("location: https://www.google.com");
}