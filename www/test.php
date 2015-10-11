<?php
include "func.php";
$x = getPlayersByTeam();
foreach ($x as $player){
//echo var_dump($player);
echo $player['name'];
echo "<br>";
echo $player['2014-value'];
echo "<br>";
echo "<hr>";
}
?>
