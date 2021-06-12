@extends('app.includePage')
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
      <div class="container">

        <div class="row no-gutters"> 

          @foreach($abouts as $about)
          @if($about->id_lang==$lang)
          <div class="col-lg-6 col-md-8 content-item">
            <span>{{$about->title}}</span>
            <p><?php echo $about->content;?></p>
          </div>
          @endif
          @endforeach

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Nos Marques Section ======= -->
    <!-- End Nos Marques Section -->
    @endsection