<nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                      {{ __('Se déconnecter') }}
                                    </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
            </form>
                
          </div>

      </li>
      <!-- Notifications Dropdown Menu -->
      
    </ul>
  </nav>
  <!-- /.navbar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Pages</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                A propos
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/about/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/about" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Catégorie
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/category/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/category" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Produits
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/product/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/product" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="/langues" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Langues</p>
                </a>
              </li>
           <li class="nav-item">
                <a href="/partenaire" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Partenaires</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/client" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Clients</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/menu" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Menus</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/section" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Sections</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/point" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Points de vente</p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>