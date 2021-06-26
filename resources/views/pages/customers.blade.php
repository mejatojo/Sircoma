@extends('app.includePage')
@section('content')
<section id="client" class="services" style="margin-top:1.5cm">
      <div class="container">
      <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>;

      <span hidden>{{$clientsLang=config('site_vars.sections')::where('reference','Clients')->where('id_lang',$lang)->get()}}</span>
      <div class="section-title">
        @if (isset($clientsLang[0]->titre))
        <h2>{{$clientsLang[0]->titre}}</h2>
        @endif
        @if (isset($clientsLang[0]->paragraphe))
        <p style="font-size:22px">
          {{$clientsLang[0]->paragraphe}}
        </p>
        @endif
      </div>
      
        <div class="row">
          @foreach($clients as $client)
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 align-items-stretch" style="text-align:center">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <img src="{{asset('/storage/'.$client->image)}}">
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section>
    @endsection
    @section('script')
    <script>
      document.querySelectorAll('.nav li')[3].classList.add('active')
    </script>
    @endsection