<?php

class Fan{
    
    //class varables
    protected $fanID;
    protected $name; 
    protected $database;
    
    
    //constructor for Fan
    function __construct($fanID, $database){
        
        
    //Query database for fan by using the session
    $sql = file_get_contents('sql/getFan.sql');
	$params = array(
		'fanid' => $_SESSION["fanID"]
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$fans = $statement->fetchAll(PDO::FETCH_ASSOC);
        
	$fan = $fans[0];
        
    //set the Fans name equal to the returned fans name
    $this->name = $fan['name'];
    $this->fanID = $fanID;
    }
    
    //getter for the Fans name
    function getName(){
        
        return $this->name;
    }
        
}
    
?>