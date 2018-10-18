<?php

    session_start();

    $link = mysqli_connect("localhost", "phpmyadmin", "hello", "youarestrong");

     if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

     if ($_GET['function'] == "logout") {
        
        session_unset();
        
    }

    function displayUserInfo() {
    	
    	global $link;

    	if($_SESSION['id'] > 0)

    	 $query = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    	 $result = mysqli_query($link, $query);
    	 
    	 if($row = mysqli_fetch_assoc($result)) {

    	 	echo "<h1>".mysqli_real_escape_string($link, $row['email'])."</h1>
  			   <p class='title'>".mysqli_real_escape_string($link, $row['usertype'])."</p>";
  			$_SESSION['usertype'] = mysqli_real_escape_string($link, $row['usertype']);

    	 }
    	 else {
    	 	echo "Data not found";
    	 }
    	 
    }

    function displayUserRegisteredEvents() {
    	echo "Nothing here";	
    }

?>