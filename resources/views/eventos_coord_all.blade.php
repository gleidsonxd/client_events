@extends('layouts.default')
@section('content')
 
<style>

.lista_eventos{
    text-align:left;
}

</style>
 
<?php
    //$usercoordid = session('id');
    #$usercoordid = ;
    $email = session('email');
    $eventos = json_decode($resulte);
    $coords = json_decode($resultc);
    foreach($coords as $c){
      if(strcmp ($c->email,$email) == 0) {
        $usercoordid = $c->id;
      }
    }
    $array= array();
    foreach($eventos as $e){
      foreach($e->servicos as $e_serv){
        if($e_serv->coord_id == $usercoordid){
          if ((in_array($e->id, $array)) == false){
            $array[$e->id] =  $e->nome;	
          }
        }
      }
    }
			
      // var_dump($array);
    
 
?>

<h1>Todos os eventos com serviços da coordenação</h1>
<div class="lista_eventos">
  <ul>
    @foreach($array as $e_key => $e_value)
      <li><a href="/eventos/{{$e_key}}"><h3 stytle="text-align:left">Nome: {{$e_value}}</h3></a></li> 
    @endforeach
  </ul>
</div>

@endsection