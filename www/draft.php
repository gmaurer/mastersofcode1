<?php

/*if (!isset($_SESSION['user'])) {
  header ("Location: http://mc.turco.com");
  die();
}*/

include ('func.php');

if( $_REQUEST["remove"] ) {
   removePick($_REQUEST["remove"]);
}

if( $_REQUEST["add"] ) {
   addPick($_REQUEST["add"]);
}

$search = $_REQUEST["searchField"];

$team = $_REQUEST["team"];
if ($team) {
      setcookie("team",$team,time()+60*60*24*30);
}
if ($team==NULL) {
   $team = $_COOKIE["team"];
}


?>
<!DOCTYPE html>
<html>
<head lang="en">

<!-- Bootstrap links -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--------------------->
      <meta charset="UTF-8">
      <title>Charity Draft</title>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
	<!-- Div to create space for header -->
	<div style="height: 100px;"></div>
	<div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">	
	<header>
	</header>
	<div class="ui-widget", align="right">
          <form method="post" id=searchForm>
  	  <label for="searchField">Search: </label>
    	  <input type=text name="searchField" id="searchField">
          </form>
 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Search by Team
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
<li><a href="#">Angels</a></li>
<li><a href="#">Astros</a></li>
<li><a href="#">Athletics</a></li>
<li><a href="#">Blue Jays</a></li>
<li><a href="#">Braves</a></li>
<li><a href="#">Brewers</a></li>
<li><a href="#">Cardinals</a></li>
<li><a href="#">Cubs</a></li>
<li><a href="#">Diamondbacks</a></li>
<li><a href="#">Dodgers</a></li>
<li><a href="#">Giants</a></li>
<li><a href="#">Indians</a></li>
<li><a href="#">Mariners</a></li>
<li><a href="#">Marlins</a></li>
<li><a href="#">Mets</a></li>
<li><a href="#">Nationals</a></li>
<li><a href="#">Orioles</a></li>
<li><a href="#">Padres</a></li>
<li><a href="#">Phillies</a></li>
<li><a href="#">Pirates</a></li>
<li><a href="#">Rangers</a></li>
<li><a href="#">Rays</a></li>
<li><a href="#">Reds</a></li>
<li><a href="#">Red Sox</a></li>
<li><a href="#">Rockies</a></li>
<li><a href="#">Royals</a></li>
<li><a href="#">Tigers</a></li>
<li><a href="#">Twins</a></li>
<li><a href="#">White Sox</a></li>
<li><a href="#">Yankees</a></li>
  </ul>
</div>
    	</div>
             <div class="row">
               <div class="col-xs-5">
        <h1>My Team</h1>
        <?php

        $x = getPicks();
        $table = "
        <tr class='row'>
        <th class='col-xs-11'>Player</th>
        <th class='col-xs-1'>Points</th>
	<th class='col-xs-1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
     <!--   <th>Orig Value</th> -->
        </tr>";
        $left = 2000;
        $pos = count($x);
      if ($pos == 0) {
        ?></table><h3>Add some of your favorite players from the search to the right</h3>
        <?php
      } else {
        foreach ($x as $pick){
          $player = $pick['player'];
          $table .= "
          <tr class='row'>
          <td>{$player['name']}</td>
          <td>{$player['2014-value']}</td>
     <!--     <td>{$player['2015-07-value']}</td> -->
          <td><font size=-1><a href='draft.php?remove={$player['name']}'>Remove</a></font></td>
          </tr>";
          $left = $left - $player['2014-value'];
          $have[$player['name']] = 1;
        }
        ?>
        <h4>Points left: <?php echo $left ?><br>Available slots: <?php echo 20-$pos ?></h4>
	<div class="container,table-responsive">
	<table border="1" class="table table-hover">
        <?php echo $table; ?>
        </table>
    <?php } ?>
        </div>
</div>
               <div class="col-xs-1"></div>
               <div class="col-xs-6">
        <h1>Search Results</h1>
	<div class="container,table-responsive">
	<table border="1" class="table table-hover">
	<?php
           $x = array();
	if ( $search != null ) {
           $x = findPlayerByName($search);
        } else {
           $x = getPlayersByTeam($team);
        }
	$table = '	
	<tr class="row">
	<th class="col-xs-9">Player</th>
	<th class="col-xs-2">Points</th>
	<th class="col-xs-1"></th>
	</tr>';
	foreach ($x as $player){
	  $table .= "
	  <tr class='row'>
	  <td>{$player['name']}</td>
	  <td>{$player['2014-value']}</td>
          <td>";
          if ( $pos < 20 and $left >= $player['2014-value'] and $have[$player['name']] == null) {
                 $table .= "<a href='draft.php?add={$player['name']}'>Add</a>";
          } else {
                 $table .= "<font color=grey>Add</font>";
          }
          $table .= "</td></tr>\n";
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
