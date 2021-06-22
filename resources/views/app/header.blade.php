
<span hidden>{{$langues=config('site_vars.langues')::all()}}</span>
<span hidden>{{$menus=config('site_vars.menus')::where('id_lang',$_SESSION['lang'])->get()}}</span>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="index.html">Green</a></h1>
       Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo mr-auto"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="/">
          @if (isset($menus[0]->libelle))
          {{$menus[0]->libelle}}
          @endif
        </a></li>
        <li><a href="/abouts">
          @if (isset($menus[1]->libelle))
          {{$menus[1]->libelle}}
          @endif
        </a></li>
          
          
          <li><a href="/categories">
          @if (isset($menus[2]->libelle))
          {{$menus[2]->libelle}}
          @endif 
        </a></li>
        <li><a href="/clients">
          @if (isset($menus[3]->libelle))
          {{$menus[3]->libelle}}
          @endif
        </a></li>
          <li><a href="/contact">
          @if (isset($menus[4]->libelle))
          {{$menus[4]->libelle}}
          @endif
        </a></li>
          <li class="drop-down"><a href="">
          @if (isset($menus[5]->libelle))
          {{$menus[5]->libelle}}
          @endif</a>
            <ul>
              @foreach($langues as $langue)
              <li><a href="/changeLang/{{$langue->lang}}">{{$langue->lang}}</a></li>
              @endforeach
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->

    </div>
  </header>