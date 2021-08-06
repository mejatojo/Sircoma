@extends('app.includePage')
@section('content')
<section id="featured-services" class="featured-services section-bg" >
      <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
      <div class="container">
      <div id="googleMap"  style="width:100%;height:400px"></div>	
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
                          <?php echo $contact[0]->paragraphe;?>
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
                             <input type="text" name="first_name" id="first_name" class="form-control" placeholder="<?php if($lang==1){echo 'Nom';}else if($lang==2){echo 'First Name';}else if($lang==3){echo 'الكنية';}else if($lang==4){echo 'apellido';}else if($lang==5){echo '姓';}?>">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="last_name" id="last_name" class="form-control" placeholder="<?php if($lang==1){echo 'Prénom';}else if($lang==2){echo 'Last Name';}else if($lang==3){echo 'الكنية';}else if($lang==4){echo 'Nombre propio';}else if($lang==5){echo '名';}?>">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="email" name="email" id="email" class="form-control" placeholder="<?php if($lang==1){echo 'Email';}else if($lang==2){echo 'E-mail';}else if($lang==3){echo 'بريد إلكتروني';}else if($lang==4){echo 'Correo electrónico';}else if($lang==5){echo '电子邮件';}?>">
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="phone" id="phone" class="form-control" placeholder="<?php if($lang==1){echo 'Télephone';}else if($lang==2){echo 'Phone number';}else if($lang==3){echo 'رقم الهاتف';}else if($lang==4){echo 'Número de teléfono';}else if($lang==5){echo '电话号码';}?>">
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="<?php if($lang==1){echo 'Message';}else if($lang==2){echo 'Message';}else if($lang==3){echo 'رسالة';}else if($lang==4){echo 'Mensaje';}else if($lang==5){echo '信息';}?>"></textarea>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                             <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block"><?php if($lang==1){echo 'Envoyer';}else if($lang==2){echo 'Send';}else if($lang==3){echo 'لترسل';}else if($lang==4){echo 'enviar';}else if($lang==5){echo '发送';}?></button>
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
          var location={lat:18.107365757184343,lng:-15.971603001968363};
            var map = new google.maps.Map(document.getElementById("googleMap"),{
              zoom:15,
              center:location
            });
            new google.maps.Marker({
                position: location,
                map,
                title: "Sircoma Nouakchott",
              });
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrWwxtVxxBB28ti-OdpEb5sJFAX81elB4&callback=myMap"></script>
    @endsection