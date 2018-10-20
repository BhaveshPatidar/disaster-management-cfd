<?php
include 'connectblog.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$query = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($conn, $_SESSION['id'])." LIMIT 1";
    	 $result47 = mysqli_query($conn, $query);
		 
		if($row = mysqli_fetch_assoc($result47)) {

		$author = mysqli_real_escape_string($conn, $row['email']);

    	    } 
    	    else {
    	 	     $author = "Not Known";
    	    }

    $title = htmlspecialchars($_POST['post_title']);
    $content = htmlspecialchars($_POST['content']);
    
    $sql = "INSERT INTO blog_post(post_title, post_content, author, posted_on) values('".$title."','".$content."','".$author."','".date('Y/m/d')."');";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
    header('Location: blog.php');
    $conn->close();
}
else{
    echo "Request method not supported";
}

?>