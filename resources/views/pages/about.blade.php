@extends('app.includePage')
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
      <div class="container">
        <span hidden>{{$aboutsLang=config('site_vars.sections')::where('reference','A propos')->where('id_lang',$lang)->get()}}</span>
        <div class="section-title">
          @if (isset($aboutsLang[0]->titre))
          <h2>{{$aboutsLang[0]->titre}}</h2>
          @endif
          @if (isset($aboutsLang[0]->paragraphe))
          <p style="font-size:22px">
            {{$aboutsLang[0]->paragraphe}}
          </p>
          @endif
        </div>
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

    <!-- ======= Nos $aboutsLang Section ======= -->
    <!-- End Nos $aboutsLang Section -->
    @endsection
    @section('script')
    <script>
      document.querySelector('li.active').classList.remove('active')
      document.querySelectorAll('.nav-menu li')[1].classList.add('active')
    </script>
    @endsection