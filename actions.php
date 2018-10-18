<?php 

	include("functions.php");

	if($_GET['action'] == 'loginSignup') {

		$error = "";
        
       if (!$_POST['email']) {
            
            $error = "An email address is required.";
            
        } else if (!$_POST['password']) {
            
            $error = "A password is required";
            
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
  
            $error = "Please enter a valid email address.";
            
		}
        
        if ($error != "") {
            
            echo $error;
            exit();
            
        }
        

    	if ($_POST['loginActive'] == "0") {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {

            	$error = "That email address is already taken.";
            }
            else {
                $query = "INSERT INTO users (`email`, `password`,`usertype`,`state`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."', '".mysqli_real_escape_string($link, $_POST['usertype'])."' , '".mysqli_real_escape_string($link, $_POST['userstate'])."')";
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id'] = mysqli_insert_id($link);
                    
                    $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    echo 1;
                    
                    
                    
                } else {
                    
                    $error = "Couldn't create user - please try again later";
                    
                }
                
            }
            
        } else {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                    
                    echo 1;
                    
                    $_SESSION['id'] = $row['id'];
                    
                } else {
                    
                    $error = "Could not find that username/password combination. Please try again.";
                    
                }

            
        }
        
         if ($error != "") {
            
            echo $error;
            exit();
            
        }

	}


	if($_GET['action'] == 'eventCreate') {


       if (!$_POST['eventName']) {
            
            $error = "An event name is required.";
            
        } else if (!$_POST['datetime']) {
  
            $error = "An event date and time is required.";
            
		} else if (!$_POST['place']) {
  
            $error = "An event state is required.";
            
		} else if (strtotime($_POST['datetime']) <= strtotime(date('d-m-Y H:i:s'))) {

			$error = "This event datetime is not valid";
		}
        
        if ($error != "") {
            
            echo $error;
            exit();
            
        }

        $query = "SELECT * FROM events WHERE name = '". mysqli_real_escape_string($link, $_POST['eventName'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {

            	$error = "That event name is already taken.";
            }

		if ($error != "") {
            
            echo $error;
            exit();
            
        }

		$query = "INSERT INTO events (`name`, `speakerid`, `date`, `place`, `confirmed`) VALUES ('". mysqli_real_escape_string($link, $_POST['eventName'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."', '".mysqli_real_escape_string($link, $_POST['datetime'])."' , '".mysqli_real_escape_string($link, $_POST['place'])."' , '".mysqli_real_escape_string($link, 'NO')."')";                
		if (mysqli_query($link, $query)) { 
			echo 1;
		}
		else {

			echo "Couldn't create event. Please try again after some time.";
		}	
	}

?>