@extends('app.includePage')
@section('content')
<span hidden>{{$lang=Config::get('site_vars.lang')}}</span>
<div class="pd-top-80 pd-bottom-50" id="grid">
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
          <div class="row">
            @foreach($categories as $category)
              @if($category->id_lang==$lang)
              <div class="col-lg-3 col-md-4  col-6 link" link="{{$category->slug_category}}" style="cursor:pointer">
                  <div class="single-post-wrap style-overlay">
                      <div class="thumb">
                          <img src="{{asset('storage/'.$category->photo)}}" alt="img"   style="height:200px" width="100%">
                          <a class="tag-base tag-light-green" href="">{{$category->name_category}}</a>
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
        document.querySelector('li.active').classList.remove('active')
      document.querySelectorAll('.nav-menu li')[2].classList.add('active')
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