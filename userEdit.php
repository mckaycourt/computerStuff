<?php include('UsersDB.php'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 7:09 PM
 */
$ID = isset($_GET['id']) ? $_GET['id'] : null;

$users = new UsersDB();
$users = $users->getUsersDB();
$user = new User("","","","","","","","");
for($i = 0; $i < sizeof($users); $i++){
    if($users[$i]->getUserID() == $ID){
        $user = $users[$i];
    }
}

echo "<form action='UsersDTO.php' method='get'>";
echo "First Name: <input type='text' name='firstName' value='".$user->getFirstName()."'>";

echo "Last Name: <input type='text' name='lastName' value='".$user->getLastName()."'>";
echo "Username: <input type='text' name='username' value='".$user->getUsername()."'>";
echo "Address: <input type='text' name='address' value='".$user->getAddress()."'>";
echo "Email: <input type='text' name='email' value='".$user->getEmail()."'>";
echo "Credit Card ID: <input type='text' name='creditCardID' value='".$user->getCreditCard()."'>";
echo "<input type='hidden' name='type' value='update'>";
echo "<input type='hidden' name='id' value='".$ID."'>";
echo "<input type='submit' value='Submit'>";

echo "</form>";