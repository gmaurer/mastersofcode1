
<head>
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
    $( "#tags" ).autocomplete({
      source: availableTags,
      minLength: 2
    });
  });
  </script>

</head>
<body>
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
</body>
