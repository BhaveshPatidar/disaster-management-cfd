<?php
    
	$conn = new mysqli("localhost", "root", "", "youarestrong");
    
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }
?>