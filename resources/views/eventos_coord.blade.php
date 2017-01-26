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
    
 
?>

<h1>Eventos atuais com serviços para a Coordenação</h1>
<div class="lista_eventos">
  <ul>
    @foreach($eventos as $e)
      @foreach($e->servicos as $e_serv)
        @if($e_serv->coord_id == $usercoordid)
          <?php 
                date_default_timezone_set('America/Fortaleza');
                $dateA = new DateTime();
                $dateA = $dateA->format('Y-m-d H:i');
                $datei = new DateTime($e->data_ini);
                $datei = $datei->format('Y-m-d H:i');
                $datef = new DateTime($e->data_fim);
                $datef = $datef->format('Y-m-d H:i');
                
          ?>
          <!--<li><a href="/eventos/{{$e->id}}"><h3 stytle="text-align:left">{{$e->nome}} - {{$e->data_ini}}</h3></a></li>-->
          @if(strtotime($datei) > strtotime($dateA)) 
            <li><a href="/eventos/{{$e->id}}"><h3 stytle="text-align:left">Nome: {{$e->nome}}</h3></a></li>
          @elseif(strtotime($datef) < strtotime($dateA))
          <!--<li><a href="/eventos/{{$e->id}}"><h3 stytle="text-align:left">{{$e->nome}} - {{$e->data_ini}}</h3></a></li>-->
          @else
          <li><a href="/eventos/{{$e->id}}"><h3 stytle="text-align:left">Nome: {{$e->nome}}</h3></a></li>
          @endif
            
          
        @endif
      @endforeach
    @endforeach
  </ul>
</div>

@endsection