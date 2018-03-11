<?php include('menu.php'); ?>
<html>
<h2>Insert into Computers</h2>
<form action="ComputersDTO.php" method="get">
    Name: <input type="text" name="name">
    Hard Drive: <input type="text" name="hardDrive">
    Ram: <input type="text" name="ram">
    GPU: <input type="text" name="gpu">
    Screen Size: <input type="text" name="screenSize">
    CPU: <input type="text" name="cpu">
    Type: <input type="text" name="type">
    Price: <input type="number" name="price" required>
    Picture: <input type="text" name="picture">
    <input type="hidden" name="type" value="insert">
    <input type="submit" value="Submit">


</form>
</html>
<?php include('ComputersDB.php'); ?>
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
    $computer = new ComputersDB();
    $computer = $computer->getComputersDB();
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Computer ID";
    echo "</th>";
    echo "<th>";
    echo "Name";
    echo "</th>";
    echo "<th>";
    echo "Hard Drive";
    echo "</th>";
    echo "<th>";
    echo "Ram";
    echo "</th>";
    echo "<th>";
    echo "GPU";
    echo "</th>";
    echo "<th>";
    echo "Type";
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

    for ($i = 0; $i < sizeof($computer); $i++) {
        echo "<tr>";
        echo "<td>";
        echo $computer[$i]->getComputerID();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getName();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getHardDrive();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getRam();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getGPU();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getType();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getPrice();
        echo "</td>";
        echo "<td>";
        echo $computer[$i]->getPicture();
        echo "</td>";
        echo "<td>";
        echo "<button onclick='removeItem(".$computer[$i]->getComputerID().")'>X</button>";
        echo "<button onclick='editItem(".$computer[$i]->getComputerID().")'>Edit</button>";
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
        window.location = "ComputersDTO.php?type=delete&computerID=" + id;
    }
    function editItem(id){

    }
</script>

