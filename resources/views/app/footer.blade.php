<section id="featured-services" class="featured-services section-bg">
  <div class="container-fluid">
    <div class="row no-gutters">
          <div class="col-md-3 col-sm-12">
            <br>
            <div class="icon-box">
              <div class="icon"><i class="icofont-google-map"></i></div>
            <iframe frameborder="0" scrolling="no"  src="https://maps.google.com/maps?q=Rue%20de%20I%20Ambassade%20du%20Senegal%2C%20Nouakchott%2C%20Mauritanie&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" aria-label="Rue de I Ambassade du Senegal, Nouakchott, Mauritanie" width="100%"></iframe>
          </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="icon-box">
              <center> 
              <a href="index.html" class="logo mr-auto"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a><br><br>
              <p class="title">
              <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>  
              <span hidden>{{$historiques=config('site_vars.sections')::where('reference','Historiques')->where('id_lang',$lang)->get()}}</span>
                @if (isset($historiques[0]->titre))
                <h2>{{$historiques[0]->titre}}</h2>
                @endif
                @if (isset($historiques[0]->paragraphe))
                <p>
                  {{$historiques[0]->paragraphe}}
                </p>
                @endif
            </p>
              </center>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="icon-box">
              <br>
              <center>
              <div class="icon"><i class="icofont-envelope"></i></div>
              <p class="title">
              <span hidden>{{$contact=config('site_vars.sections')::where('reference','Contact')->where('id_lang',$lang)->get()}}</span>
                @if (isset($contact[0]->paragraphe))
                <p>
                  {{$contact[0]->paragraphe}}
                </p>
                @endif
              </p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </section>
<footer id="footer">
    <div class="container">
      <h3>Sircoma</h3>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> 
      <div class="copyright">
        &copy; 2021 <strong><span>Sircoma</span></strong>. All Rights Reserved.
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>