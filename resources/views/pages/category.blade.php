@extends('app.includePage')
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
<div class="pd-top-80 pd-bottom-50" id="grid" style="margin-top:2cm;margin-bottom:2cm;">
      <div class="container">
      <span hidden>{{$ProduitsLang=config('site_vars.sections')::where('reference','Produits')->where('id_lang',$lang)->get()}}</span>
      <div class="section-title">
        @if (isset($ProduitsLang[0]->titre))
        <h2>{{$ProduitsLang[0]->titre}}</h2>
        @endif
        @if (isset($ProduitsLang[0]->paragraphe))
        <p style="font-size:22px">
          {{$ProduitsLang[0]->paragraphe}}
        </p>
        @endif
      </div>
        <div class="row text-center about-row">
            @foreach($categories as $category)
              @if($category->id_lang==$lang)
              <div  class="col-md-4 col-sm-12 col-xs-12" style="cursor:pointer">
                  <div class="row">
                     <div class="service-widget link" link="{{$category->slug_category}}" style="box-shadow: 0 15px 25px -10px #000;margin-bottom:1cm;margin-right:1cm;">
                        <div class="post-media wow fadeIn"  >
                          <img src="{{asset('storage/'.$category->photo)}}"  style="height:7cm" alt="img"   class="img-rounded">
                        </div>
                        <h3><a class="tag-base tag-light-green">{{$category->name_category}}</a></h3>
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
    <script>
      document.querySelectorAll('.nav li')[2].classList.add('active')
        var links = document.querySelectorAll('.link')
        for(i=0;i<links.length;i++)
        {
            links[i].addEventListener('click',function()
            {
                window.location="/products/"+this.getAttribute('link')
            })
        }
    </script>
    @endsection