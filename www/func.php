<?php

$m = new MongoClient();
$db = $m->bb;
$d = "2014";
$user = $_SESSION["user"];
if ( $user == NULL) {
   $user="chuck@turco.com";
}

$event = $_SESSION["event"];
if (null === $event) {
   $event = "event1";
}

$user_mongo = NULL;

$criteria = array('user' => $user, 'event' => $event);
$u = $db->users->findOne($criteria);
if ( $u != NULL) {
     $user_mongo = $u;
} else {
     $user_mongo = $db->users->insert($criteria);
}
//echo "<!-- " . var_dump($user_mongo) . " -->";

function getPlayersByTeam($team) {
   global $db;
   if ($team == null) { $team = "Cardinals"; }
   $key = array( '2015-07.Team' => $team, "2014.type" => 'batter' );
   $sort = array( '2014-value' => -1 );
   $cursor = $db->players->find($key)->sort($sort);
   $retval = array();
   foreach ($cursor as $document) {
      array_push($retval, $document);
   }
   return $retval;
}

function getPicks() {
   global $db,$user_mongo,$event;
   $key = array( 'user' => $user_mongo, 'event' => $event );
   $sort = array( 'player_sort' => -1 );
   $cursor = $db->picks->find($key)->sort($sort);
   $retval = array();
   foreach ($cursor as $document) {
      array_push($retval, $document);
   }
   return $retval;
}

function findPlayerByName($player) {
   // Find the player by name
   global $db;
   $p = $db->players->findOne(array('name' => $player, '2014.type' => 'batter'));
   if ($p == NULL) {
       echo "player '$player' not found";
       die();
   }
  return array($p);
}

function removePick($player) {
   global $db,$user,$event,$user_mongo;
   $x = array('user' => $user_mongo, 'event' => $event, 'player.name' => $player);
   $db->picks->remove($x,array('just_one' => TRUE ) );
}

function addPick($player) {
   global $db,$user,$event,$user_mongo;
   // Find the player by name
   $d = $db->players;
   $p = $d->findOne(array('name' => $player));
   if ($p == NULL) {
       echo "player '$player' not found";
       die();
   }
   $x = array('user' => $user_mongo, 'event' => $event, 'player_sort' => $p["2014-value"], 'player' => $p);
   if ( ! $retval=$db->picks->findOne($x) ) {
     $retval = $db->picks->insert($x);
   }
   return $retval;
}

?>
