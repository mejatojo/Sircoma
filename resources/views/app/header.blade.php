
<span hidden>{{$langues=config('site_vars.langues')::all()}}</span>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="index.html">Green</a></h1>
       Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Accueil</a></li>
          <li><a href="/abouts">A propos de nous</a></li>
          <li><a href="/categories">Produits</a></li>
          <li><a href="#client">Clients</a></li>
          <li><a href="#partenaire">Partenaires</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="drop-down"><a href="">Langues</a>
            <ul>
              @foreach($langues as $langue)
              <li><a href="/changeLang/{{$langue->lang}}">{{$langue->lang}}</a></li>
              @endforeach
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="#about" class="get-started-btn scrollto">Get Started</a>

    </div>
  </header>