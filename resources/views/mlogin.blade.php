<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type = "text/javascript" src = "./js/regex.js"> </script>
	<link href="./css/signin.css" rel="stylesheet">
	
	
	<style type="text/css">
 	   
	.jumbotron {
   		 background-color: #00420c;
	    padding-top: 5%;
	    margin-right: 15%;
	    margin-left: 15%;
	    padding-bottom: 5%;
	    margin-bottom: 5%;
	}

	.footer {
			/*position: absolute;*/
		  right: 0;
		  bottom: 0;
		  left: 0;
		  padding: 1rem;
		  margin-top: 10%;
      margin-right: 15%;
      margin-left: 15%;
      background-color: #00420c;
    }
    .form-signin{
    		border-style: double; 
    		padding:2%,2%,2%,2%;
    	
    }
    
    </style>
</head>
<body>
	<!--Banner-->
	
	<div class="jumbotron" style="background-color:#00420c">
      <div class="banner">
        <a href="/eventos" style="text-decoration: none"><h1 style="color:white; text-align: center">Campus JP - EVENTOS</h1></a>
      </div>
    </div>
    <!--Banner-->
    
	<div class="container" >

      <form class="form-signin" action="\login" method="POST"  onSubmit="return validatel(this);" name="form_mlogin">
        <h2 class="form-signin-heading">Please sign in</h2>
        	<label for="inputEmail" class="sr-only">Email address</label>
					Email: <input type="text" value="noadmin@ifpb.edu.br" name="email" id="inputEmail" class="form-control" required autofocus> <!--^[a-z0-9._%+-]+@ifpb\.edu\.br$-->
					<label for="inputPassword" class="sr-only">Password</label>
      		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    
	<!--<form action="\login" method="POST">-->
	<!--	Email: <input type="text" value="email4@email.com" name="email">-->
	<!--	{{ csrf_field() }}-->
	<!--	<input type="submit">-->
	<!--</form>-->
	<footer class="footer">
      <div class="container">
        <a href="http://www.ifpb.edu.br"><h5 style="color:white; text-align: center">IFPB - Instituto Federal da Paraiba</h5></a>
      </div>
    </footer>
		
</body>
</html>