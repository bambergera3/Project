<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// Get type of form
$action = $_GET['action'];

// Get the playerid from the url
$playerid = get('playerid');

// Initially set $book to null;
$player = null;


// If book isbn is not empty, get book record into $book variable from the database
//     Set $book equal to the first book in $books
// 	   Set $book_categories equal to a list of categories associated to a book from the database
if(!empty($playerid)) {
	$sql = file_get_contents('sql/getPlayer.sql');
	$params = array(
		'playerid' => $playerid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$players = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$player = $players[0];
}

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$team = $_POST['team'];
	$country = $_POST['country'];
	$position = $_POST['position'];
	$number = $_POST['number'];
		
	
    $sql = file_get_contents('sql/updatePlayer.sql');
    $params = array(
        'playerid' => $playerid,
        'name' => $name,
        'team' => $team,
        'country' => $country,
        'position' => $position,
        'number' => $number
     );
        
    $statement = $database->prepare($sql);
    $statement->execute($params);
        
	// Redirect to book listing page
	header('location: index.php');
}

// In the HTML, if an edit form:
	// Populate textboxes with current data of book selected 
	// Print the checkbox with the book's current categories already checked (selected)
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Edit Player</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Edit Player</h1>
        <form action="" method="POST">
			<div class="form-element">
				<label>Name:</label>
				<input type="text" name="name" class="textbox" value="<?php echo $player['name'] ?>" />
			</div>
			<div class="form-element">
				<label>Team:</label>
				<input type="text" name="team" class="textbox" value="<?php echo $player['team'] ?>" />
			</div>
			<div class="form-element">
				<label>Country:</label>
                <input readonly type="text" name="country" class="textbox" value="<?php echo $player['country'] ?>" />
			</div>
			<div class="form-element">
				<label>Position:</label>
				<input type="text" name="position" class="textbox" value="<?php echo $player['position'] ?>" />
			</div>
			<div class="form-element">
				<label>Number:</label>
				<input type="number" name="number" class="textbox" min = "0" max="99" value="<?php echo $player['number'] ?>" />
			</div>
			<div class="form-element">
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
		</form>
	</div>
</body>
</html>