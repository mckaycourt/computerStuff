<?php include('menu.php'); ?>
<?php include('UsersDB.php'); ?>
<style><?php include('table.css'); ?></style>
<html>
<h2>Create a new Person</h2>
<form action="UsersDTO.php" method="get">
    First Name: <input type="text" name="firstName">
    Last Name: <input type="text" name="lastName">
    Username: <input type="text" name="username">
    Password: <input type="text" name="password">
    Address: <input type="text" name="address">
    Email: <input type="text" name="email">
    Credit Card ID: <input type="text" name="creditCardID">
    <input type="hidden" name="type" value="insert">
    <input type="submit" value="Submit">


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
    $users = new UsersDB();
    $users = $users->getUsersDB();
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "First Name";
    echo "</th>";
    echo "<th>";
    echo "Last Name";
    echo "</th>";
    echo "<th>";
    echo "Username";
    echo "</th>";
    echo "<th>";
    echo "Address";
    echo "</th>";
    echo "<th>";
    echo "Email";
    echo "</th>";
    echo "<th>";
    echo "Delete/Edit";
    echo "</th>";
    echo "</tr>";

    for ($i = 0; $i < sizeof($users); $i++) {
        echo "<tr>";
        echo "<td>";
        echo $users[$i]->getFirstName();
        echo "</td>";
        echo "<td>";
        echo $users[$i]->getLastName();
        echo "</td>";
        echo "<td>";
        echo $users[$i]->getUsername();
        echo "</td>";
        echo "<td>";
        echo $users[$i]->getAddress();
        echo "</td>";
        echo "<td>";
        echo $users[$i]->getEmail();
        echo "</td>";
        echo "<td>";
        echo "<button onclick='removeItem(".$users[$i]->getUserID().")'>X</button>";
        echo "<button onclick='editItem(".$users[$i]->getUserID().")'>Edit</button>";
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
        window.location = "UsersDTO.php?type=delete&id=" + id;
    }
    function editItem(id){

        window.location = "userEdit.php?id=" + id;
    }
</script>
