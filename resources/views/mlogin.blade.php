<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="./css/signin.css" rel="stylesheet">
</head>
<body>
	<div class="container" >

      <form class="form-signin" action="\login" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        	<label for="inputEmail" class="sr-only">Email address</label>
			Email: <input type="text" value="email4@email.com" name="email" id="inputEmail" class="form-control" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
       		<!--<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>-->
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    
	<!--<form action="\login" method="POST">-->
	<!--	Email: <input type="text" value="email4@email.com" name="email">-->
	<!--	{{ csrf_field() }}-->
	<!--	<input type="submit">-->
	<!--</form>-->
		
</body>
</html>