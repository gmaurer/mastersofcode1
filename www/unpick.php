<body>
<?php
include "func.php";

$player = $_GET["player"];

if ( $player == NULL ) {
  echo "Please pass in player";
} else {
?>
Removing a pick for
<br>
user: <?php echo $user ?><br>
event: <?php echo $event ?><br>
player: <?php echo $player ?><br>
<?php
   removePick($player);
}

// Show picks

$x = getPicks();
foreach ($x as $pick){
echo var_dump($pick) . "<hr>\n";
}
?>
