@extends('layouts.levento')
@section('content')

<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 50%;
      margin: auto;
  }
</style>
<script>
$('.carousel').carousel({
  interval: false
})

</script>
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
<!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>
    <li data-target="#myCarousel" data-slide-to="9"></li>
    <li data-target="#myCarousel" data-slide-to="10"></li>
    <li data-target="#myCarousel" data-slide-to="11"></li>
    
</ol>
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="./image/tutorial/inicialnlogado.png" alt="Tela Inicial" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Página Inicial</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>

    <div class="item">
        <img src="./image/tutorial/mlogin.png" alt="Tela Login" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Login</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>

    <div class="item">
        <img src="./image/tutorial/iniciallogado.png" alt="Tela inicio logado" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Página Inicial Logado</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>

    <div class="item">
        <img src="./image/tutorial/formeventosclear.png" alt="Formulario eventos clear" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Formulario eventos vazio</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/formeventoscomplete.png" alt="Formulario eventos complete" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Formulario eventos completo</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/tela_suc_cad_evento.png" alt="Tela Sucesso Eventos" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Tela Sucesso Eventos</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/eventou1.png" alt="Eventos" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Eventos</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/eventou2.png" alt="Eventos Edit" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Eventos Editar</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/eventouAD.png" alt="Eventos Edit Delete" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Eventos Atualizar/Deletar</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/mc1.png" alt="Conta Usuário" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Conta do Usuário</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/mc2.png" alt="Conta Usuário Edit" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Conta do Usuário Editar</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
    <div class="item">
        <img src="./image/tutorial/mc3.png" alt="Conta Usuário Atualizar" width="460" height="345">
        <div class="carousel-caption">
            <h3 style= "color: Black;">Conta do Usuário Atualizar</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>

@endsection