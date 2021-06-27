
<span hidden>{{$langues=config('site_vars.langues')::all()}}</span>


    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{asset('images/loaders/loader-building2.gif')}}" alt="">
    </div>
    <!-- end loader -->
    <!-- END LOADER -->
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default" data-spy="affix">
            <div class="top-header">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-hidden">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-hidden">
                           <div class="gem-contacts-item gem-contacts-phone">
                              <a class="phone-icon" href="#" target="_blank" title="phone"><i class="fa fa-phone" aria-hidden="true"></i>+1 999-888-77-66</a>
                           </div>
                        </div>
                        <div class="top-area-block top-area-socials socials-colored-hover">
                           <div class="socials inline-inside"> 
                              <a class="socials-item" href="#" target="_blank" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                              <a class="socials-item" href="#" target="_blank" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
                              <a class="socials-item" href="#" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                              <a class="socials-item" href="#" target="_blank" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
                              <a class="socials-item" href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a> 
                              <a class="socials-item" href="#" target="_blank" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('images/logo-2.png')}}" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a data-scroll href="/">
                        <span hidden>{{$home=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->where('reference','Accueil')->get()}}</span>
                        @if (isset($home[0]->libelle))
                        {{$home[0]->libelle}}
                        @endif
                        </a></li>
                        <li><a data-scroll href="/abouts">
                        <span hidden>{{$about=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->where('reference','A propos')->get()}}</span>
                        @if (isset($about[0]->libelle))
                        {{$about[0]->libelle}}
                        @endif
                        </a></li>
                        <li><a data-scroll href="/categories">
                        <span hidden>{{$prod=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->where('reference','Produits')->get()}}</span>
                        @if (isset($prod[0]->libelle))
                        {{$prod[0]->libelle}}
                        @endif
                        </a></li>
                        <li><a data-scroll href="/clients">
                        <span hidden>{{$Clients=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->where('reference','Clients')->get()}}</span>
                        @if (isset($Clients[0]->libelle))
                        {{$Clients[0]->libelle}}
                        @endif
                        </a></li>
                        <li><a data-scroll href="/contact">
                        <span hidden>{{$Contact=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->where('reference','Contact')->get()}}</span>
                        @if (isset($Contact[0]->libelle))
                        {{$Contact[0]->libelle}}
                        @endif
                        </a></li>
                        <li><a data-scroll  class="dropdown">
                        <span hidden>{{$Langue=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->where('reference','Langue')->get()}}</span>
                        @if (isset($Langue[0]->libelle))
                        {{$Langue[0]->libelle}}
                        @endif
                        <div class="dropdown-content" style="text-align:center">
                                @foreach($langues as $langue)
                                <p class="link" link="/changeLang/{{$langue->lang}}"  style="cursor:pointer">{{$langue->lang}}</p>
                                @endforeach
                              </div>
                        </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="home"></div>
    <script>
        var links = document.querySelectorAll('.link')
        for(i=0;i<links.length;i++)
        {
            links[i].addEventListener('click',function()
            {
                window.location=this.getAttribute('link')
            })
        }
    </script>
