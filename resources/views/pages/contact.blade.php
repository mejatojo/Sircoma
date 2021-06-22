@extends('app.includePage')
@section('content')
<section id="featured-services" class="featured-services section-bg">
      <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
      <div class="container">
      <span hidden>{{$pointdevente=config('site_vars.sections')::where('reference','Point de vente')->where('id_lang',$lang)->get()}}</span>
      <div class="section-title">
        @if (isset($pointdevente[0]->titre))
        <h2>{{$pointdevente[0]->titre}}</h2>
        @endif
        @if (isset($pointdevente[0]->paragraphe))
        <p style="font-size:22px">
          {{$pointdevente[0]->paragraphe}}
        </p>
        @endif
      </div>
      <div class="elementor-custom-embed"><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=SIRCOMA%20%D8%B3%D9%8A%D8%B1%D9%83%D9%88%D9%85%D8%A7%2C%20Rue%20de%20I%20Ambassade%20du%20Senegal%2C%20Nouakchott%2C%20Mauritanie&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" aria-label="SIRCOMA سيركوما, Rue de I Ambassade du Senegal, Nouakchott, Mauritanie" width="100%"></iframe></div>	
        <br>	
          @foreach($points as $point)
          @if($point->id_lang==$lang)
          <p><i class="icofont-google-map"></i> {{$point->point}}</p>
          @endif
          @endforeach
          <br>

      </div>
    </section> <!--End Featured Services Section -->
    @endsection
    @section('script')
    <script>
      document.querySelector('li.active').classList.remove('active')
      document.querySelectorAll('.nav-menu li')[4].classList.add('active')
    </script>
    @endsection