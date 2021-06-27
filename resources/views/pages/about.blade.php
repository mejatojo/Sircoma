@extends('app.includePage')
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>


    <div id="about" class="section wb" >
        <div class="container">
            <div class="row">
            @foreach($abouts as $about)
               @if($about->id_lang==$lang)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="message-box">
                        <h2>{{$about->title}}</h2>
                        <h5><?php echo $about->content;?></h5>
                    </div>
                    <!-- end messagebox -->
                </div>
              @endif
            @endforeach
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <div class="sep1"></div>
    </div>
    <!-- ======= Nos $aboutsLang Section ======= -->
    <!-- End Nos $aboutsLang Section -->
    @endsection
    @section('script')
    <script>
      document.querySelectorAll('.nav li')[1].classList.add('active')
    </script>
    @endsection