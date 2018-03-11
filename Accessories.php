<?php include('menu.php'); ?>
<?php include('AccessoriesDB.php'); ?>
<style><?php include('table.css'); ?></style>
<html>
<h2>Add an Accessory</h2>
<form action="AccessoriesDTO.php" method="get">
    Name: <input type="text" name="name"><br>
    System Requirements: <input type="text" name="systemReqs"><br>
    Price: <input type="text" name="price"><br>
    Picture: <input type="text" name="password"><br>
    <input type="hidden" name="type" value="insert"><br>
    <input type="submit" value="Submit"><br>


</form>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 12:05 PM
 */

if (isset( $_SESSION['username'] ) ) {
    $accessories = new AccessoriesDB();
    $accessories = $accessories->getAccessoriesDB();
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Name";
    echo "</th>";
    echo "<th>";
    echo "System Requirements";
    echo "</th>";
    echo "<th>";
    echo "Price";
    echo "</th>";
    echo "<th>";
    echo "Picture";
    echo "</th>";
    echo "<th>";
    echo "Delete/Edit";
    echo "</th>";
    echo "</tr>";

    for ($i = 0; $i < sizeof($accessories); $i++) {
        echo "<tr>";
        echo "<td>";
        echo $accessories[$i]->getName();
        echo "</td>";
        echo "<td>";
        echo $accessories[$i]->getSystemRequirements();
        echo "</td>";
        echo "<td>";
        echo $accessories[$i]->getPrice();
        echo "</td>";
        echo "<td>";
        echo $accessories[$i]->getPicture();
        echo "</td>";
        echo "<td>";
        echo "<button onclick='removeItem(".$accessories[$i]->getAccessoryID().")'>X</button>";
        echo "<button onclick='editItem(".$accessories[$i]->getAccessoryID().")'>Edit</button>";
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
        window.location = "AccessoriesDTO.php?type=delete&id=" + id;
    }
    function editItem(id){

        window.location = "editAccessory.php?id=" + id;
    }
</script>
