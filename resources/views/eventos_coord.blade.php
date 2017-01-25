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
<h1>Eventos com serviços para a coordenação</h1>
<div class="lista_eventos">
  <ul>
    @foreach($eventos as $e)
      @foreach($e->servicos as $e_serv)
        @if($e_serv->coord_id == $usercoordid)
          <li><a href="/eventos/{{$e->id}}"><h3 stytle="text-align:left">{{$e->nome}}</h3></a></li>
          
        @endif
      @endforeach
    @endforeach
  </ul>
</div>

@endsection