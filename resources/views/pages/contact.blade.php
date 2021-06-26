@extends('app.includePage')
@section('content')
<section id="featured-services" class="featured-services section-bg"  style="margin-top:3.5cm">
      <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
      <div class="container">
      <div id="googleMap"  style="width:100%;height:200px"></div>	
        <br>	
          @foreach($points as $point)
          @if($point->id_lang==$lang)
          <p><i class="fa fa-map-marker" aria-hidden="true" style="color:#23A406"></i> {{$point->point}}</p>
          @endif
          @endforeach
          <br>

      </div>
    </section> <!--End Featured Services Section -->
    <div  class="section wb">
        <div class="container">
           <div class="section-title row text-center">
              <div class="col-md-8 col-md-offset-2">
                  <span hidden>{{$pointdevente=config('site_vars.sections')::where('reference','Contactez-nous')->where('id_lang',$lang)->get()}}</span>
                  @if (isset($pointdevente[0]->titre))
                  <h3>{{$pointdevente[0]->titre}}</h3>
                  @endif
                  @if (isset($pointdevente[0]->paragraphe))
                 <p class="lead">{{$pointdevente[0]->paragraphe}}</p>
                 @endif
              </div>
              <!-- end col -->
           </div>
           <!-- end title -->
           <div class="row">
              <div class="col-lg-4 col-md-4">
                 <div class="contant-info">
                    <span hidden>{{$contact=config('site_vars.sections')::where('reference','Contact')->where('id_lang',$lang)->get()}}</span>
                        <ul>
                        <li class="address clearfix">
                        @if (isset($contact[0]->paragraphe))
                          {{$contact[0]->paragraphe}}
                        @endif
                        </li>
                        </ul>
                 </div>
              </div>
              <div class="col-md-8">
                 <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                       <fieldset class="row-fluid">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Website">
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <label class="sr-only">Select Department</label>
                             <select name="select_service" id="select_service" class="selectpicker form-control" data-style="btn-white">
                                <option value="12">Select Service</option>
                                <option value="Building Service">Building Service</option>
                                <option value="Tover Design">Tover Design</option>
                                <option value="Others">Others</option>
                             </select>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                             <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get a Quote</button>
                          </div>
                       </fieldset>
                    </form>
                 </div>
              </div>
              <!-- end col -->
           </div>
           <!-- end row -->
        </div>
        <!-- end container -->
     </div>
    @endsection
    @section('script')
    <script>
      document.querySelectorAll('.nav li')[4].classList.add('active')
    </script>
    <script>
function myMap() {
  var location={lat:18.102820,lng:-15.975120};
var map = new google.maps.Map(document.getElementById("googleMap"),{
  zoom:4,
  center:location
});
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiHKfk6jcSQN0vmSTZRroVe_YCIhFkfEI&callback=myMap"></script>
    @endsection