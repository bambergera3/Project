<?php

//autolaoder function for fan class
function my_autoloader($class){
    
    include 'class.' . $class . '.php';
 }

// Connecting to the database
$user = 'bambergera3';
$password = 'vPkQy8xt';

$database = new PDO('mysql:host=localhost;dbname=db_spring17_bambergera3', $user, $password);

//Start session
session_start();

//current url
$current_url = basename($_SERVER['REQUEST_URI']);

//load class Fan
//my_autoloader('Fan');

// if fanID isn't set and current url is not login.php
if (!isset($_SESSION["fanID"]) && $current_url != 'login.php') {
    
    //send to login page
    //header("Location: login.php");
}



// Else if fanID is set
elseif (isset($_SESSION["fanID"])) {

	//get the fan from the database
	$fan = new Fan($_SESSION["fanID"], $database);
}