@extends('app.includePage')
@section('style')
<style>
    h2::after {
    content: '';
    position: absolute;
    display: block;
    width: 40px;
    height: 3px;
    background: #5cb874;
    bottom: 0;
    left: calc(50% - 20px);
}
</style>
@endsection
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
  
        <div class="item active">
          <img src="assets/img/slide/slide1.jpg" alt="Los Angeles" style="width:100%;">
          <div class="carousel-caption">
          </div>
        </div>
  
      
        <div class="item">
          <img src="assets/img/slide/slide3.png" alt="New York" style="width:100%;">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="assets/img/slide/slide4.jpg" alt="New York" style="width:100%;">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="assets/img/slide/slide5.png" alt="New York" style="width:100%;">
          <div class="carousel-caption">
          </div>
        </div>
    
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div id="about" class="section wb">
      <div class="container">
          <div class="row">
              <div class="col-lg-12" style="text-align:center">
                  <span hidden>{{$presentations=config('site_vars.sections')::where('reference','Présentation')->where('id_lang',$lang)->get()}}</span>
                  <div class="message-box">
                      @if (isset($presentations[0]->titre))
                      <h2 style="padding-bottom: 1cm;">{{$presentations[0]->titre}}</h2>
                      @endif
                      @if (isset($presentations[0]->paragraphe))
                      <p style="font-size:22px">
                        {{$presentations[0]->paragraphe}}
                      </p>
                      @endif
                  </div>
                  <!-- end messagebox -->
              </div>
              <!-- end col -->
          </div>
  
    
  </div>
      <!-- end container -->
  </div>
  <div id="about" class="section wb">
      <div class="container">
          <div class="row">
              <div class="col-lg-12" style="text-align:center">
                  <span hidden>{{$Marques=config('site_vars.sections')::where('reference','Marques')->where('id_lang',$lang)->get()}}</span>
                  <div class="message-box">
                      @if (isset($Marques[0]->titre))
                      <h2 style="padding-bottom: 1cm;">{{$Marques[0]->titre}}</h2>
                      @endif
                      @if (isset($Marques[0]->paragraphe))
                      <p style="font-size:22px">
                        {{$Marques[0]->paragraphe}}
                      </p>
                      @endif
                  </div>
                  <!-- end messagebox -->
              </div>
              <!-- end col -->
          </div>
          <!-- end row -->
      </div>
    </div>
  <section  class="clients" style="margin-bottom:3cm;margin-top:1cm">
      <div class="container">

      <span hidden>{{$parts=config('site_vars.sections')::where('reference','Partenaires')->where('id_lang',$lang)->get()}}</span>
      <div class="message-box">
                      @if (isset($parts[0]->titre))
                      <h2 style="padding-bottom: 1cm;text-align:center">{{$parts[0]->titre}}</h2>
                      @endif
                      @if (isset($parts[0]->paragraphe))
                      <p style="font-size:22px">
                        {{$parts[0]->paragraphe}}
                      </p>
                      @endif
                  </div> 

        <div class="owl-carousel clients-carousel" style="margin-top:1cm;">
          @foreach($partenaires as $partenaire)
          <img src="{{asset('storage/'.$partenaire->image)}}" alt="">
          @endforeach
        </div>

      </div> 
    </section><!-- End Partenaires Section -->
  @include('pages.customers')
@endsection
@section('script')
<script>
  document.querySelectorAll('.nav li')[0].classList.add('active')
</script>
@endsection