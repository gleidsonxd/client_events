@extends('layouts.default')
@section('content')

<?php
if(isset($result)){
    $usuarios = json_decode($result);
}
?>

<h1> {{ $erro or $sucesso }} </h1>
@if (isset($result))
<br><br>
<h3>Usuario</h3>
<p>Nome: {{ @$usuarios->nome }}</p> 
<p>Email: {{@$usuarios->email}}</p> 
<p>Matricula: {{@$usuarios->matricula}}</p>
@endif
@endsection