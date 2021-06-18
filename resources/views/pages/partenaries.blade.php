<!-- ======= Partenaires Section ======= -->
<section id="partenaire" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Partenaires</h2>
        </div>

        <div class="owl-carousel clients-carousel">
          @foreach($partenaires as $partenaire)
          <img src="{{asset('storage/'.$partenaire->image)}}" alt="">
          @endforeach
        </div>

      </div> 
    </section><!-- End Partenaires Section -->