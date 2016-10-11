<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form action="\login" method="POST">
		Email: <input type="text" value="email4@email.com" name="email">
		{{ csrf_field() }}
		<input type="submit">
	</form>
		
</body>
</html>