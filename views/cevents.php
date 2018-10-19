<div class="card text-center">
  <?php
    getEventDetails();  
  ?> 
    <?php if($_SESSION['usertype'] == 'User') { ?>
       <a href='#' class='btn btn-primary' data-toggle="modal" data-target="#eventModal" id="registerEventButton">Register for event</a>
    <?php } else { ?> 
       <a href='#' class='btn btn-primary' data-toggle="modal" data-target="#eventModal" id="createEventButton"></a>
      Create Event
    <?php } ?></a>

</div>