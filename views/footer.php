<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!--Form--> 
<form method='POST'>
	<h4 id='log'>Login</h4>
	<input type='hidden' id="loginActive" name="loginActive" value="1">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
 <div class="form-group" id='drop' style='display: none;'>
    <label for="usertype">Signup as</label>
    <select class="form-control" id="usertype">
      <option>User</option>
      <option>Psychologist</option>
    </select>
  </div>
  <div>
  	<button type="submit" class="btn btn-primary" id="loginSignupButton">Login</button>
  	<a href="#" id='toggleLogin'>Sign Up</a>
  </div> 
</form>	


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
            url: "http://localhost/YouAreStrong/disaster-management-cfd/actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val(),
			success: function(result) {
				alert(result);
			} 
		})


	})
</script>

  </body>
</html>