<?php

/*if (!isset($_SESSION['user'])) {
  header ("Location: http://mc.turco.com");
  die();
}*/

include ('func.php');

if( $_GET["remove"] ) {
   removePick($_GET["remove"]);
}

if( $_GET["add"] ) {
   addPick($_GET["add"]);
}

?>

<!-- Bootstrap links -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--------------------->

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
	    var availablePlayers = [
	    <?php
	    $m = new MongoClient();
	    $db = $m->bb;
	    $collection = $db->players;
	    $cursor = $collection->find(array(),array('name' => 1, 'playerid' => 1))->sort(array('name' => 1));
	    foreach ($cursor as $document) {
                $n = $document["name"];
                if ($gotit[$n] == null) {
	            echo "\"{$n}\",\n";
                    $gotit[$n] = 1;
                }
    	    }
	?>
	];
            $( "#searchField" ).autocomplete({
             source: availablePlayers,
                   minLength: 2,
             select: function(event, ui) {
                   $("#searchField").val(ui.item.label);
                   $("#searchForm").submit(); }
                       });
		       });
      </script>
</head>
<body>
	<div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">	
	<header>
	</header>
	<div class="ui-widget", align="right">
          <form method="post" id=searchForm>
  	  <label for="searchField">Search: </label>
    	  <input id="searchField">
          </form>
    	</div>
             <div class="row">
               <div class="col-xs-4">
        <h1>My Team</h1>
	<div class="container,table-responsive">
	<table border="1" class="table table-hover">
        <?php

        $x = getPicks();
        $table = "
        <tr class='row'>
        <th class='col-xs-11'>Player</th>
	<th class='col-xs-1'></th>
     <!--   <th>Orig Value</th> -->
     <!--   <th>New Value</th> -->
        </tr>";
        foreach ($x as $pick){
          $player = $pick['player'];
          $table .= "
          <tr class='row'>
          <td>{$player['name']}</td>
     <!--     <td>{$player['2014-value']}</td>  -->
     <!--     <td>{$player['2015-07-value']}</td> -->
          <td><a href='draft.php?remove={$player['name']}'>Remove</a></td>
          </tr>";
        }
        echo $table;
        ?>
        </table>
        </div>
</div>
               <div class="col-xs-1"></div>
               <div class="col-xs-7">
        <h1>Search Results</h1>
	<div class="container,table-responsive">
	<table border="1" class="table table-hover">
	<?php
	
	$x = getPlayersByTeam();
	$table = '	
	<tr class="row">
	<th class="col-xs-9">Player</th>
	<th class="col-xs-2">Value</th>
	<th class="col-xs-1"></th>
	</tr>';
	foreach ($x as $player){
	  $table .= "
	  <tr class='row'>
	  <td>{$player['name']}</td>
	  <td>{$player['2014-value']}</td>
          <td><a href='draft.php?add={$player['name']}'>Add</a></td>
	  </tr>";
	}
	echo $table;
	?>
	</table>
	</div>
                </div>
              </div>
	</div>
	<div class="col-xs-2"></div>
	</div>
</body>
</html>
