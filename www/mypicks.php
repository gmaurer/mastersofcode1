<?php

/*if (!isset($_SESSION['user'])) {
  header ("Location: http://mc.turco.com");
  die();
}*/

include ('func.php');

if( $_GET["remove"] ) {
   removePick($_GET["remove"]);
}

if( $_POST["cmd"] == "player_search" ) {
}
  
?>

<!DOCTYPE html>
<html>
<head lang="en">
      <meta charset="UTF-8">
      <title>Charity Draft</title>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>
        $(function() {
	    var availableTags = [
	    <?php
	    $m = new MongoClient();
	    $db = $m->bb;
	    $collection = $db->players;
	    $cursor = $collection->find(array(),array('name' => 1, 'playerid' => 1))->sort(array('name' => 1));
	    foreach ($cursor as $document) {
	        echo '"'.$document["name"] .'",' . "\n";   // ,"' . $document["playerid"];
    	}
	?>
	];
            $( "#searchField" ).autocomplete({
             source: availableTags,
                   minLength: 2,
             select: function(event, ui) { 
                   $("#searchField").val(ui.item.label);
                   $("#searchForm").submit(); }
                       });
		       });
      </script>
</head>
<body>
	<header>
	</header>
        Search for a player:
	<div class="ui-widget">
          <form method="post" id=searchForm>
          <input type=hidden name="cmd" value="player_search">
  	  <label for="searchField">Tags: </label>
    	  <input id="searchField" name="search">
    	</div>
	<table>
        <br>

	<?php
	
	$x = getPicks();
	$table = "
	<tr>
	<th>Player</th>
	<th>Orig Value</th>
	<th>New Value</th>
	</tr>";
	foreach ($x as $pick){
          $player = $pick['player'];
	  $table .= "
	  <tr>
	  <td>{$player['name']}</td>
	  <td>{$player['2014-value']}</td>
	  <td>{$player['2015-07-value']}</td>
          <td><a href='mypicks.php?remove={$player['name']}'>Remove</a></td>
	  </tr>";
	}
	echo $table;
	?>
	</table>
</body>
</html>
