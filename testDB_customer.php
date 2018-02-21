<?php include('Customers.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 2/20/18
 * Time: 5:28 PM
 */

$customers = new Customers();
$customers = $customers->getCustomers();

for($i = 0; $i < sizeof($customers); $i++){
    echo $customers[$i]->getId();
    echo "<br>";
    echo $customers[$i]->getName();
    echo "<br>";
}


