<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="loginModalTitle">Login</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger" id="loginAlert"></div>
        <form>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
  <fieldset class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email address">
  </fieldset>
  <fieldset class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </fieldset>
  <fieldset class="form-group" id='drop' style='display: none;'>
    <label for="usertype">Signup as</label>
    <select class="form-control" id="usertype">
      <option>User</option>
      <option>Psychologist</option>
    </select>
 </fieldset>
</form>
      </div>
      <div class="modal-footer">
          <a id="toggleLogin">Sign up</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>





<script>
	$('#toggleLogin').click(function() {
		if($("#loginActive").val() == "1") {
			$("#loginActive").val("0");
			$('#drop').css("display","block");
			$('#log').html('SignUp');
			$('.btn').html('SignUp');
			$('#toggleLogin').html('Login');
		}
		
		else {
			$("#loginActive").val("1");
			$('#drop').css("display","none");
			$('#log').html('Login');
			$('.btn').html('Login');
			$('#toggleLogin').html('SignUp');
		
		}
	});


	$("#loginSignupButton").click(function() {
		$.ajax({
			type:"POST",
            url: "actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&usertype=" + $("#usertype option:selected").val() + "&loginActive=" + $("#loginActive").val(),
			success: function(result) {
				 if (result == "1") {
                    
                    window.location.assign("http://localhost/YouAreStrong/disaster-management-cfd/");
                    
                } else {
                    
                    $("#loginAlert").html(result).show();
                    
                }
			} 
		})


	})
</script>

  </body>
</html>