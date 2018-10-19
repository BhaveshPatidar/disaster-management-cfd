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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="?page=home">YouAreStrong</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if ($_SESSION['id']) { ?>
        <li class="nav-item">
          <a class="nav-link" href="?page=dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=pevents">Probable Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=cevents">Confirmed Events</a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="?page=blog">Blog</a>
      </li>
    </ul>
  </div>


    <div class="form-inline pull-xs-right">
      
      <?php if ($_SESSION['id']) { ?>
      
        <a class="btn btn-success-outline" href="?function=logout">Logout</a>
      
      <?php } else { ?>
      
    <button class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">Login/Signup</button>
      
      <?php } ?>
  </div>
</nav>  