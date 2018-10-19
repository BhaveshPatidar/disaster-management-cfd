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

    	if($_SESSION['id'] > 0) {

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
    }

    function displayUserRegisteredEvents() {
        global $link;

        if($_SESSION['id'] > 0) {

            $query = "SELECT * FROM userevent WHERE userid = ". mysqli_real_escape_string($link, $_SESSION['id']);
            $result = mysqli_query($link, $query);

            while($row = mysqli_fetch_assoc($result)){

                $query2 = "SELECT * FROM events WHERE eventid = ". mysqli_real_escape_string($link, $row['eventid']);
                $result2 = mysqli_query($link, $query2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<h4 class='title'> Event Name : ".mysqli_real_escape_string($link, $row2['name'])."</h1>
               <p class='title'>Event Date and time : ".mysqli_real_escape_string($link, $row2['date'])."</p> <p class='title'>Confirmed : ".mysqli_real_escape_string($link, $row2['confirmed'])."</p> <p class='title'>Place: ".mysqli_real_escape_string($link, $row2['place'])."</p>";
            }
        }

    }

    function displayUserCreatedEvents() {

    	global $link;

    	if($_SESSION['id'] > 0) {

    		$query = "SELECT * FROM events WHERE speakerid = ". mysqli_real_escape_string($link, $_SESSION['id']);
    	    $result = mysqli_query($link, $query);

    	    while($row = mysqli_fetch_assoc($result)) {

    	 	echo "<h4 class='title'> Event Name : ".mysqli_real_escape_string($link, $row['name'])."</h1>
  			   <p class='title'>Event Date and time : ".mysqli_real_escape_string($link, $row['date'])."</p> <p class='title'>Confirmed : ".mysqli_real_escape_string($link, $row['confirmed'])."</p> <p class='title'>Place: ".mysqli_real_escape_string($link, $row['date'])."</p>";
  			
    	}
    	 
    	}
    }

    function getProbableEventDetails() {

    	global $link;

		if($_SESSION['id'] > 0) {	

                $query =  "SELECT * FROM events WHERE confirmed = 'NO'";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    $query2 = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $row['speakerid'])." LIMIT 1";
                    $result2 = mysqli_query($link, $query2);
                    $row2= mysqli_fetch_assoc($result2);
                    echo "<div class='card-body'>Event ID : ".mysqli_real_escape_string($link, $row['eventid'])."  
                            <h5 class='card-title'>Event Name : ".mysqli_real_escape_string($link, $row['name'])."</h5>
                            <p class='card-text'>By : ".mysqli_real_escape_string($link, $row2['email'])."</p>
                          <div class='card-footer text-muted'> on ".mysqli_real_escape_string($link, $row['date'])."  in  ".mysqli_real_escape_string($link, $row['place']). 
                          "</div></div>";
                }
        }
    }

    function getConfirmedEventDetails() {

        global $link;

        if($_SESSION['id'] > 0) {   

                $query =  "SELECT * FROM events WHERE confirmed = 'YES'";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    $query2 = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $row['speakerid'])." LIMIT 1";
                    $result2 = mysqli_query($link, $query2);
                    $row2= mysqli_fetch_assoc($result2);
                    echo "<div class='card-body'>Event ID : ".mysqli_real_escape_string($link, $row['eventid'])."  
                            <h5 class='card-title'>Event Name : ".mysqli_real_escape_string($link, $row['name'])."</h5>
                            <p class='card-text'>By : ".mysqli_real_escape_string($link, $row2['email'])."</p>
                          <div class='card-footer text-muted'> on ".mysqli_real_escape_string($link, $row['date'])."  in  ".mysqli_real_escape_string($link, $row['place']). 
                          "</div></div>";
                }
        }
    }

    function clearRedundantEvents() {

        global $link;

        if($_SESSION['id'] > 0) {

            $query = "SELECT * FROM events";
            $result =  $result = mysqli_query($link, $query); 
            while($row =  mysqli_fetch_assoc($result)) {
                if(strtotime($row['date']) <= strtotime(date('d-m-Y H:i:s'))) {
                    $query = "DELETE FROM events WHERE eventid = ".mysqli_real_escape_string($link, $row['eventid']);
                    mysqli_query($link, $query);
                    $query = "DELETE FROM userevent WHERE eventid = ".mysqli_real_escape_string($link, $row['eventid']);
                    mysqli_query($link, $query);
                }
            }
        }  

    }

?>