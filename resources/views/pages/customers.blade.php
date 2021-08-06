
<section id="client" class="services">
    <div class="container">
        <span hidden>{{$lang=Config::get('site_vars.lang')}}</span>;

        <span hidden>{{$clientsLang=config('site_vars.sections')::where('reference','Clients')->where('id_lang',$lang)->get()}}</span>
        <div class="message-box">
            @if (isset($clientsLang[0]->titre))
            <h2 style="padding-bottom: 1cm;text-align:center">{{$clientsLang[0]->titre}}</h2>
            @endif
        </div>
      
        <div class="owl-carousel partenaires-carousel">
          @foreach($clients as $client)
          <img src="{{asset('/storage/'.$client->image)}}" alt="">
          @endforeach
        </div>
        
        <div style="margin: 10rem 0;"></div>

    </div>
</section>