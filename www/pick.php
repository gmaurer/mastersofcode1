<body>
<?php
include "func.php";

$player = $_GET["player"];

if ( $player == NULL ) {
  echo "Please pass in player";
} else {
?>
Inserting a new pick set for:
<br>
user: <?php echo $user ?><br>
event: <?php echo $event ?><br>
player: <?php echo $player ?><br>
<?php
   echo "db in file:";
   echo var_dump($db);
   addPick($player);
}

// Show picks

$x = getPicks();
foreach ($x as $pick){
echo var_dump($pick) . "<hr>\n";
}
?>
