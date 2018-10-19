<?php

	include("functions.php");

	include("views/header.php");

	if ($_GET['page'] == "dashboard") {

		include("views/dashboard.php");
	
	} else if ($_GET['page'] == "pevents") {
		
		include("views/pevents.php");
		
	} else {

		include("views/home.php");

	}

	include("views/footer.php");

?>