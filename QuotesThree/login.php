<!-- 
This is the login page for Final Project, Quotation Service. 

File name login.php 
    
Author: Ali Elbekov
-->

<!DOCTYPE html>
<html>
<head>
<title>Log in</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" type="text/css" href="styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<!-- <h1>Log in</h1> -->
<!-- <form class = "childPages" action = "controller.php" method = "post"> -->
<!-- <input name = "userName" placeholder = "Username"></input> -->
<!-- <br> -->
<!-- <br> -->
<!-- <input  type="password" name = "password" placeholder = "Password"></input> -->
<!-- <br> -->
<!-- <br> -->
<!-- <button type = "submit" name ="login" value = "Login">Submit</button> -->
<!-- </form> -->
<!-- <br> -->

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
       <form  action = "controller.php" method = "post">

              <div class="form-outline form-white mb-4">
                <input required name = "userName" placeholder = "Username" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Your username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input required type="password" name = "password" placeholder = "Password"class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type = "submit" name ="login" value = "Login">Login</button>
	    </form>
			<br>
			<p class="text-white mb-5">
            <?php
                session_start();
                if( isset($_SESSION ['loginError']))
                  echo $_SESSION ['loginError'];
                unset($_SESSION ['loginError']);
                ?>
			</p> 
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Register</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>