             
<footer id="footer">
         <div id="footer-widgets" class="container style-1">
            <div class="row">
               <div class="col-md-4">
                  <div class="widget widget_text">
                  <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>  
                  <span hidden>{{$historiques=config('site_vars.sections')::where('reference','Historiques')->where('id_lang',$lang)->get()}}</span>
                     <h2 class="widget-title"><span>
                         @if (isset($historiques[0]->titre))
                         {{$historiques[0]->titre}}
                        @endif
                    </span></h2>
                     <div class="textwidget">
                        <a class="navbar-brand" href="/"><img src="{{asset('images/logo-2.png')}}" alt="image"></a>
                        <p><?php if(isset($historiques[0]->paragraphe)){echo $historiques[0]->paragraphe;}?></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="widget widget_links">
                  <span hidden>{{$maps=config('site_vars.sections')::where('reference','Map')->where('id_lang',$lang)->get()}}</span>
                     <h2 class="widget-title"><span>
                     @if (isset($maps[0]->titre))
                     {{$maps[0]->titre}}
                    @endif</span></h2>
                     <iframe frameborder="0" scrolling="no"  src="https://maps.google.com/maps?q=Rue%20de%20I%20Ambassade%20du%20Senegal%2C%20Nouakchott%2C%20Mauritanie&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" aria-label="Rue de I Ambassade du Senegal, Nouakchott, Mauritanie" width="100%" height="185px"></iframe>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="widget widget_information">
                  <span hidden>{{$contact=config('site_vars.sections')::where('reference','Contact')->where('id_lang',$lang)->get()}}</span>
                     <h2 class="widget-title"><span>
                         @if (isset($contact[0]->titre))
                         {{$contact[0]->titre}}
                        @endif</span></h2>
                     <ul>
                        <li class="address clearfix">
                        <?php if(isset($contact[0]->paragraphe)){echo $contact[0]->paragraphe;}?>
                        </li>
                     </ul>
                  </div>
                  <div class="widget widget_socials">
                     <div class="socials">
                        <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-dribbble"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="bottom" class="clearfix style-1">
            <div class="container">
               <div id="bottom-bar-inner" class="wprt-container">
                  <div class="bottom-bar-inner-wrap">
                     <div class="bottom-bar-content">
                        <div id="copyright">All Rights Reserved. cadortech © 2021 </div>
                        <!-- /#copyright -->
                     </div>
                     <!-- /.bottom-bar-content -->
                     <!-- <div class="bottom-bar-menu pull-right">
                        <ul class="bottom-nav">
                           <li><a href="#/">HISTORY</a></li>
                           <li><a href="#/">FAQ</a></li>
                           <li><a href="#/">EVENTS</a></li>
                        </ul>
                     </div> -->
                     <!-- /.bottom-bar-menu -->
                  </div>
               </div>
            </div>
         </div>
      </footer>
   