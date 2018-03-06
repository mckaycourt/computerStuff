<?php include('Customers.php'); ?>
<?php include('Items.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 2/20/18
 * Time: 5:28 PM
 */

//$customers = new Customers();
//$customers = $customers->getCustomers();
//
//for($i = 0; $i < sizeof($customers); $i++){
//    echo $customers[$i]->getId();
//    echo "<br>";
//    echo $customers[$i]->getName();
//    echo "<br>";
//}

$items = new Items();
$items = $items->getItems();

for($i = 0; $i < sizeof($items); $i++){
    echo $items[$i]->getItemId();
    echo "<br>";
    echo $items[$i]->getName();
    echo "<br>";
}

?>

<html>
<form action="InsertItem.php" method="get">
    <input type="number" name="id">
    <input type="text" name="name">
    <input type="submit" value="Submit">

</form>
</html>
