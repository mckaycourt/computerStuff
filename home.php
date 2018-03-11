<?php include('menu.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 10:00 PM
 */

if(isset( $_SESSION['username'] )){
    echo "Welcome ".$_SESSION['firstName']." ".$_SESSION['lastName']."!";
    echo "<br>";
    echo "This site is currently under construction. Please come back in a few weeks.<br>";
    if(isset($_SESSION['permissions'])){
        echo "But because you are an admin feel free to explore what is already made.";
    }
}