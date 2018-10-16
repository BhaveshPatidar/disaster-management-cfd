<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>YouAreStrong</title>
	
	<link rel="stylesheet" href="/styles.css">
  </head>
  <body>

    <div class="form-inline pull-xs-right">
      
      <?php if ($_SESSION['id']) { ?>
      
        <a class="btn btn-success-outline" href="?function=logout">Logout</a>
      
      <?php } else { ?>
      
    <button class="btn btn-success-outline">Login/Signup</button>
      
      <?php } ?>
  </div>