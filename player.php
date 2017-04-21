<?php

// include config file
include('config.php');

// Include functions
include('functions.php');

// Get the playerid from the url
$playerid = get('playerid');

// Get a list of players from the database with the playerid passed in the URL
$sql = file_get_contents('sql/getPlayer.sql');
$params = array(
	'playerid' => $playerid
);
$statement = $database->prepare($sql);
$statement->execute($params);
$players = $statement->fetchAll(PDO::FETCH_ASSOC);

// Set $book equal to the first book in $players
$player = $players[0];


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Player</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1><?php echo $player['name'] ?></h1>
        <img src = images/<?php echo $player['playerid']; ?>.jpg alt=<?php echo $player['name']; ?>  align="left" style = width:300;height:300>
		<p>
			#<?php echo $player['number']; ?> for
			<?php echo $player['team']; ?><br />
            Position: <?php echo $player['position']; ?> <br />
            Country of Origin: <?php echo $player['country']; ?>
		</p>        
        <br/> <br/> <br/>
	</div> 
</body>
</html>