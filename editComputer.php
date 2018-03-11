<?php include('ComputersDB.php'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: mckaycourt
 * Date: 3/10/18
 * Time: 8:28 PM
 */

$ID = isset($_GET['computerID']) ? $_GET['computerID'] : null;

$computers = new ComputersDB();
$computers = $computers->getComputersDB();
$computer = new Computer("", "", "", "", "", "", "", "", "", "");
for ($i = 0; $i < sizeof($computers); $i++) {
    if ($computers[$i]->getComputerID() == $ID) {
        $computer = $computers[$i];
    }
}
echo "<form action='ComputersDTO.php' method='get'>";
echo "Name: <input type='text' name='name' value='".$computer->getName()."'><br>";
echo "Hard Drive: <input type='text' name='hardDrive' value='".$computer->getHardDrive()."'><br>";
echo "Ram: <input type='text' name='ram' value='".$computer->getRam()."'><br>";
echo "GPU: <input type='text' name='gpu' value='".$computer->getGPU()."'><br>";
echo "Screen Size: <input type='text' name='screenSize' value='".$computer->getScreenSize()."'><br>";
echo "CPU: <input type='text' name='cpu' value='".$computer->getCPU()."'><br>";
echo "Type: <input type='text' name='typeOfComputer' value='".$computer->getType()."'><br>";
echo "Price: <input type='number' name='price' value='".$computer->getPrice()."' required><br>";
echo "Picture: <input type='text' name='picture' value='".$computer->getPicture()."'><br>";
echo "<input type='hidden' name='computerID' value='".$ID."'>";
echo "<input type='hidden' name='type' value='update'><br>";
echo "<input type='submit' value='Submit'><br>";

echo "</form>";