<body>
<?php
$user = $_GET["user"];
$event = $_GET["event"];
$player = $_GET["player"];

if ( $user == NULL or $event ==NULL or $player == NULL ) {
  echo "Please pass in user, event and player";
} else {
?>
Inserting a new pick set for:
<br>
user: <?php echo $user ?><br>
event: <?php echo $event ?><br>
player: <?php echo $player ?><br>
<?php
   $m = new MongoClient();
   $db = $m->bb;

   $users = $db->users;
   $picks = $db->picks;
   $players = $db->player;

   $x = array('user' => $user, 'event' => $event, 'player' => $player);
   if ( ! $retval=$picks->findOne($x) ) {
     $retval = $picks->insert($x);
     echo "Record inserted.<br>";
   } else {
     echo "Record found, nothing done.";
   }
   echo var_dump($retval);
}
?>
</body>
