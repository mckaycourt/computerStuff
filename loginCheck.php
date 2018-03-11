<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 9:24 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset( $_SESSION['permissions'] ) || $_SESSION['permissions'] != "admin") {
    header('location: login.html');
}
