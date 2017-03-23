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
    #----------------------------------------------------#
    $array= array();
    foreach($eventos as $e){
      foreach($e->servicos as $e_serv){
        if($e_serv->coord_id == $usercoordid){
          date_default_timezone_set('America/Fortaleza');
                $dateA = new DateTime();
                $dateA = $dateA->format('Y-m-d H:i');
                $datei = new DateTime($e->data_ini);
                $datei = $datei->format('Y-m-d H:i');
                $datef = new DateTime($e->data_fim);
                $datef = $datef->format('Y-m-d H:i');

         if(strtotime($datei) > strtotime($dateA)){ 
            if ((in_array($e->id, $array)) == false){
              $array[$e->id] =  $e->nome;	
            } 
         }
         elseif(strtotime($datef) < strtotime($dateA)){
         }
         else{
            if ((in_array($e->id, $array)) == false){
                $array[$e->id] =  $e->nome;	
              } 
          } 

        }
      }
    }
    var_dump($array);
?>

<h1>Eventos atuais com serviços para a Coordenação</h1>
<div class="lista_eventos">
  <ul>
    @foreach($array as $e_key => $e_value)
      <li><a href="/eventos/{{$e_key}}"><h3 stytle="text-align:left">Nome: {{$e_value}}</h3></a></li>
          

    @endforeach
  </ul>
</div>

@endsection