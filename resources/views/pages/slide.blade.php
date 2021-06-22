@extends('app.includePage')
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
 
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide1.jpg)">
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide2.jpg)">
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide3.jpg)">
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide4.jpg)">
        </div>

        <!-- Slide 5 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide5.jpg)">
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
  <section class="about">
      <div class="container">
        <span hidden>{{$presentations=config('site_vars.sections')::where('reference','Présentation')->where('id_lang',$lang)->get()}}</span>
        <div class="section-title">
          @if (isset($presentations[0]->titre))
          <h2>{{$presentations[0]->titre}}</h2>
          @endif
          @if (isset($presentations[0]->paragraphe))
          <p style="font-size:22px">
            {{$presentations[0]->paragraphe}}
          </p>
          @endif
        </div>
      </div>
    </section>
  <section id="about" class="about">
      <div class="container">

      <span hidden>{{$Marques=config('site_vars.sections')::where('reference','Marques')->where('id_lang',$lang)->get()}}</span>
      <div class="section-title">
        @if (isset($Marques[0]->titre))
        <h2>{{$Marques[0]->titre}}</h2>
        @endif
        @if (isset($Marques[0]->paragraphe))
        <p style="font-size:22px">
          {{$Marques[0]->paragraphe}}
        </p>
        @endif
      </div>
      </div>
    </section>
  @include('pages.partenaries')
@endsection
    @section('script')
    <script>
      document.querySelector('li.active').classList.remove('active')
      document.querySelectorAll('.nav-menu li')[0].classList.add('active')
    </script>
    @endsection