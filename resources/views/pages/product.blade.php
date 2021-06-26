@extends('app.includePage')
@section('style')
@endsection
@section('content')

<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
    <div id="projects" class="section" style="margin-top:2.2cm;">
         <div class="container">
            <div class="row">
                @foreach($products as $product)
                @if($product->id_lang==$lang)
                
              <div class="col-md-3 col-sm-4 co-xs-12 gal-item" style="height:6cm;">
                           <div class="box">
                              <a href="#" data-toggle="modal" data-target="#{{$product->id}}">
                              <img src="{{asset('storage/'.$product->photo_product)}}" alt="#" style="height:6cm;"/>
                              </a>
                              <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                          <div class="modal-body">
                                              <div class="col-6">
                                                    <img src="{{asset('storage/'.$product->photo_product)}}" alt="#" />
                                                </div>
                                             <div class="col-3 description" style="margin:30px;margin-top:0" >
                                                    <h2>{{$product->name_product}}</h2>
                                                    <p>{{$product->description_product}}</p>
                                                 </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                           </div>
                        </div>
                        @endif
                        @endforeach
            </div>
         </div>
      </div>
    @endsection
    @section('script')
    <!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
    @endsection
    @section('script')
    <script>
      document.querySelector('.nav li')[2].classList.add('active')
    </script>
    @endsection