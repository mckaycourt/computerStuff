<?php include('AccessoriesDB.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 8:28 PM
 */

$ID = isset($_GET['id']) ? $_GET['id'] : null;

$accessories = new AccessoriesDB();
$accessories = $accessories->getAccessoriesDB();
$accessory = new Accessory("","","","","");
for($i = 0; $i < sizeof($accessories); $i++){
    if($accessories[$i]->getAccessoryID() == $ID){
        $accessory = $accessories[$i];
    }
}

echo "<form action='AccessoriesDTO.php' method='get'>";
echo "Name: <input type='text' name='name' value='".$accessory->getName()."'>";
echo "System Requirements: <input type='text' name='systemReqs' value='".$accessory->getSystemRequirements()."'>";
echo "Price: <input type='number' name='price' value='".$accessory->getPrice()."'>";
echo "Picture: <input type='text' name='picture' value='".$accessory->getPicture()."'>";
echo "<input type='hidden' name='type' value='update'>";
echo "<input type='hidden' name='id' value='".$ID."'>";
echo "<input type='submit' value='Submit'>";

echo "</form>";