@extends('layouts.default')
@section('content')
	<?php 
		//var_dump(json_decode($result,true));
		// echo "<br><br>";
		$eventos = json_decode($result);
		//echo "Nome: ".$coords->{'nome'}." Email: ".$coords->{'email'};

	 ?>
	<form action="/eventos/{{ $eventos->id }}" method="POST">
				
		<input type="text" name="nome" value="{{ $eventos->nome }}"><br>
		<textarea rows="4" cols="50" name="desc">{{ $eventos->descricao }}</textarea><br>

		
		
		<select name="servicos[]" multiple="multiple">
		<option value="">---</option>
		<option value="" selected>S1</option>
		<option value="" selected>S2</option>
		<option value="">S3</option>

		</select><br>

		<select name="lugares[]" multiple="multiple">
		<option value="">---</option>
		<option value="">L1</option>
		<option value=""selected>L2</option>
		<option value=""selected>L3</option>
			
		</select><br>
		

		<input type="datetime" name="data_ini" value="{{ $eventos->data_ini }}"><br>
		<input type="datetime" name="data_fim" value="{{ $eventos->data_fim }}"><br>
		
		
		{{ csrf_field() }}
		<input type="submit" value="ATT">
		<input type="hidden" value="PUT" name="_method">
	</form>

	<form action="/eventos/{{ $eventos->id }}" method="POST">
		{{ csrf_field() }}
		<input type="submit" value="DELETAR">
		<input type="hidden" value="DELETE" name="_method">
	</form>
		
		
	</form>
	<a href="/index">Volta</a>
@endsection