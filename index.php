<?php

//include config file
include('config.php');

// Include functions
include('functions.php');

// Get search term
$term = get('search-term');

// Get a list of players using
// Print the results of search results
// Add a link printed for each book to book.php with an passing the isbn
// Add a link printed for each book to form.php with an action of edit and passing the isbn
$players = searchPlayers($term, $database);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Players</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Soccer Players</h1>
		<form method="GET">
			<input type="text" name="search-term" placeholder="Search Players" />
			<input type="submit" />
		</form>
        <br/>
		<?php foreach($players as $player) : ?>
         <img src = images/<?php echo $player['playerid']; ?>.jpg alt=<?php echo $player['name']; ?> align="left" style = width:300;height:300>
            <p>
				<?php echo $player['name']; ?><br />
				#<?php echo $player['number']; ?>
                <?php echo $player['position']; ?> 
				for <?php echo $player['team']; ?> <br />
                Country of Origin: <?php echo $player['country']; ?> <br />
				<a href="form.php?action=edit&playerid=<?php echo $player['playerid'] ?>">Edit Player</a><br />
				<a href="player.php?playerid=<?php echo $player['playerid'] ?>">View Player</a>
			</p>
		<?php endforeach; ?>
		
		<!-- print currently accessed by the current username -->
		
		<!-- A link to the logout.php file -->
	</div>
</body>
</html>