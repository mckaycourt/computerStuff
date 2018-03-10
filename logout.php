<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/9/18
 * Time: 10:56 PM
 */

session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
session_destroy();

header('location: testDB_customer.php');