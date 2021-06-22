<!-- ======= Partenaires Section ======= -->
<section id="partenaire" class="clients">
      <div class="container">

      <span hidden>{{$parts=config('site_vars.sections')::where('reference','Partenaires')->where('id_lang',$lang)->get()}}</span>
      <div class="section-title">
        @if (isset($parts[0]->titre))
        <h2>{{$parts[0]->titre}}</h2>
        @endif
        @if (isset($parts[0]->paragraphe))
        <p style="font-size:22px">
          {{$parts[0]->paragraphe}}
        </p>
        @endif
      </div>

        <div class="owl-carousel clients-carousel">
          @foreach($partenaires as $partenaire)
          <img src="{{asset('storage/'.$partenaire->image)}}" alt="">
          @endforeach
        </div>

      </div> 
    </section><!-- End Partenaires Section -->