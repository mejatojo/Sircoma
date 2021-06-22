@extends('app.includePage')
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
@endsection
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
<!-- ======= Nos Produits Section ======= -->
<section id="produits" class="portfolio">
      <div class="container">
        <div class="row portfolio-container">
          @foreach($products as $product)
          @if($product->id_lang==$lang)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('storage/'.$product->photo_product)}}" class="img-fluid" alt="" width="100%" style="height:8cm; object-fit: cover;">
              <div class="portfolio-info">
                <h4>{{$product->name_product}}</h4>
                <div class="portfolio-links">
                  
                <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter"><i class="bx bx-plus"></i>
                </a>
                
                </div>
              </div>
            </div>
          </div> 
          <!-- Modal -->
                <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document" style="margin-top:100px">
                        <div class="modal-content">
                          <div class="row">
                              <div class="col-5">
                                  <img src="{{asset('storage/'.$product->photo_product)}}" class="img-fluid" alt=""  style="object-fit: cover;">
                              </div>  
                              <div class="col-7">
                                <h2>{{$product->name_product}}</h2>
                                <hr>
                                <p>{{$product->description_product}}</p>
                              </div>
                          </div>
                        </div>
                    </div>
                    </div>
                    <!-- Fin Modal -->
          @endif
          @endforeach

          

        </div>

      </div>
    </section>
    <!-- End Portfolio Section -->
    @endsection
    @section('script')
    <!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
    @endsection
    <!-- <section id="produits" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Nos Produits</h2>
        </div>
        <div class="row portfolio-container">
          @foreach($products as $product)
          @if($product->id_lang==$lang)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('storage/'.$product->photo_product)}}" class="img-fluid" alt="" width="100%" style="height:8cm; object-fit: cover;">
              <div class="portfolio-info">
                <h4>{{$product->name_product}}</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="{{asset('storage/'.$product->photo_product)}}" data-gall="portfolioGallery" class="venobox" title="{{$product->name_product}}" > <i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> 
          @endif
          @endforeach

          

        </div>

      </div>
    </section>End Portfolio Section -->
    @section('script')
    <script>
      document.querySelectorAll('.nav-menu li')[2].classList.add('active')
    </script>
    @endsection