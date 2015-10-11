<body>
<?php
include "func.php";

$player = $_GET["player"];

if ( $player == NULL ) {
  echo "Please pass in player";
  die();
}
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
?>
</body>
