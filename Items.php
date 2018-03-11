<?php include('menu.php'); ?>
<?php include('loginCheck.php'); ?>

<html>
<h2>Insert into Items</h2>
<form action="InsertItem.php" method="get">
    ID: <input type="number" name="id"><br>
    Name: <input type="text" name="name"><br>
    <input type="hidden" name="type" value="insert"><br>
    <input type="submit" value="Submit"><br>


</form>
</html>
<?php include('Customers.php'); ?>
<?php include('ItemsDB.php'); ?>
<style><?php include('table.css'); ?></style>
<?php error_reporting( E_ALL ); ?>
<?php ini_set('display_errors', 1);?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 2/20/18
 * Time: 5:28 PM
 */

if (isset( $_SESSION['username'] ) ) {
    $items = new ItemsDB();
    $items = $items->getItems();
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Item ID";
    echo "</th>";
    echo "<th>";
    echo "ID";
    echo "</th>";
    echo "<th>";
    echo "Name";
    echo "</th>";
    echo "<th>";
    echo "Delete/Edit";
    echo "</th>";
    echo "</tr>";

    for ($i = 0; $i < sizeof($items); $i++) {
        echo "<tr>";
        echo "<td>";
        echo $items[$i]->getItemId();
        echo "</td>";
        echo "<td>";
        echo $items[$i]->getID();
        echo "</td>";
        echo "<td>";
        echo $items[$i]->getName();
        echo "</td>";
        echo "<td>";
        echo "<button onclick='removeItem(".$items[$i]->getItemId().")'>X</button>";
        echo "<button onclick='editItem(".$items[$i]->getItemId().")'>Edit</button>";
        echo "</td>";

        echo "<tr>";
    }
    echo "</table>";
}
else{
    header('location: login.html');
}
?>
<script>
    function removeItem(id){
        window.location = "insertItem.php?type=delete&id=" + id;
    }
    function editItem(id){

    }
</script>

