<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eventos</title>
</head>
<body>
	<?php @$email = session('email'); @$logado = session('logado'); ?>
	{{ isset($email) ? $email : 'Default'}}
	@if ($logado == true)
	<a href="/sair">Sair</a><br>
	@else
	<a href="/">Voltar</a><br>
	@endif
	
	 @yield('content')
</body>
</html>