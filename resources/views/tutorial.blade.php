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
    
</ol>
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="http://kagoceramic.com/kagopic/b/118.jpg" alt="azul" width="460" height="345">
        <div class="carousel-caption">
            <h3>Azul</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>

    <div class="item">
        <img src="http://www.nationaltiles.com.sg/upload/product/pic-0-526-2.jpg" alt="branco" width="460" height="345">
         <div class="carousel-caption">
            <h3>Branco</h3>
            <!--<p>The atmosphere in Chania has a touch of Florence and Venice.</p>-->
        </div>
    </div>

    <div class="item">
    <img src="http://www.clayhausceramics.com/images/glossy/clover.jpg" alt="verde" width="460" height="345">
     <div class="carousel-caption">
            <h3>Verde</h3>
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