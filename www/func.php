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

if ( $user and $event ) {
   $users = $db->users;
   $u = $users->findOne(array('user' => $user, 'event' => $event));
   if ( $u ) {
     $user = $u;
   }
}

function getPlayersByTeam($team = "Cardinals" ) {
   global $db;
   // db.players.find({"2015-07.Team": /Cardinal/, "2014.type": "pitcher"},{'name':1 /*,'2014':1*/})
   $key = array( '2015-07.Team' => $team, '2014.type' => 'batter' );
   $sort = array( '2014-value' => -1 );
   $cursor = $db->players->find($key)->sort($sort);
   $retval = array();
   foreach ($cursor as $document) {
      array_push($retval, $document);
   }
   return $retval;
}

function getPicks() {
   global $db,$user,$event;
   $key = array( 'user' => $user, 'event' => $event );
}

function addPick($player) {
   global $db,$user,$event;
   // Find the player by name
   $d = $db->players;
   $p = $d->findOne(array('name' => $player));
   if ($p == NULL) {
       echo "player '$player' not found";
       die();
   }
   $x = array('user' => $user, 'event' => $event, 'player' => $p["_id"]);
   if ( ! $retval=$db->picks->findOne($x) ) {
     $retval = $db->picks->insert($x);
   }
   return $retval;
}

?>

