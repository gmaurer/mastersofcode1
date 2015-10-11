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
<style type="text/css">
    .col-xs-5{

        background-color: #E3AE57;
    }

    .col-xs-6{

        background-color: #E3AE57;
    }


    .h1style{

        font-family: Futura, “Trebuchet MS”, Arial, sans-serif;

    }

    .tcheck{



    }

    tr{
        background-color: #FFFFFF;
    }
    </style>


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
<body style="background-color: #232B2B;">
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
  <ul class="dropdown-menu dropdown-menu-right">
<li><a href="?team=Angels">Angels</a></li>
<li><a href="?team=Astros">Astros</a></li>
<li><a href="?team=Athletics">Athletics</a></li>
<li><a href="?team=Blue Jays">Blue Jays</a></li>
<li><a href="?team=Braves">Braves</a></li>
<li><a href="?team=Brewers">Brewers</a></li>
<li><a href="?team=Cardinals">Cardinals</a></li>
<li><a href="?team=Cubs">Cubs</a></li>
<li><a href="?team=Diamondbacks">Diamondbacks</a></li>
<li><a href="?team=Dodgers">Dodgers</a></li>
<li><a href="?team=Giants">Giants</a></li>
<li><a href="?team=Indians">Indians</a></li>
<li><a href="?team=Mariners">Mariners</a></li>
<li><a href="?team=Marlins">Marlins</a></li>
<li><a href="?team=Mets">Mets</a></li>
<li><a href="?team=Nationals">Nationals</a></li>
<li><a href="?team=Orioles">Orioles</a></li>
<li><a href="?team=Padres">Padres</a></li>
<li><a href="?team=Phillies">Phillies</a></li>
<li><a href="?team=Pirates">Pirates</a></li>
<li><a href="?team=Rangers">Rangers</a></li>
<li><a href="?team=Rays">Rays</a></li>
<li><a href="?team=Reds">Reds</a></li>
<li><a href="?team=Red Sox">Red Sox</a></li>
<li><a href="?team=Rockies">Rockies</a></li>
<li><a href="?team=Royals">Royals</a></li>
<li><a href="?team=Tigers">Tigers</a></li>
<li><a href="?team=Twins">Twins</a></li>
<li><a href="?team=White Sox">White Sox</a></li>
<li><a href="?team=Yankees">Yankees</a></li>
  </ul>
</div>
    	</div>
             <div class="row">
               <div class="col-xs-5">
        <?php
        $left = 2000;
        $x = getPicks();
        $table = "
	<div class='container,table-responsive'>
	<table border='1' class='table table-hover'>
        <tr class='row'>
        <th class='col-xs-11'>Player</th>
        <th class='col-xs-1'>Points</th>
	<th class='col-xs-1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
     <!--   <th>Orig Value</th> -->
        </tr>";
        $pos = count($x);
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
        $table .= "
        </table>
        </div>";
        ?>
        <h1 class="h1style" >My Team</h1>
        <h4>Points left: <?php echo $left ?><br>Available slots: <?php echo 20-$pos ?></h4>
<?php
      if ($pos == 0) {
        echo "<h3>Add some of your favorite players from the search to the right</h3>";
      } else {
        echo $table;
      }
    ?>
</div>
               <div class="col-xs-1"></div>
               <div class="col-xs-6">
        <h1 class="h1style" >Search Results</h1>
	<div class="container,table-responsive">
	<table border="1" class="table table-hover tcheck">
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
