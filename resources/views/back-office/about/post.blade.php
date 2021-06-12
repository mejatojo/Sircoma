@extends('back-office.includePage')
@section('content')
<div class="container">
    <div class="row">
            <div class="card card-warning col-lg-6 offset-lg-3 col-md-12" style="margin-top:100px">
              <div class="card-header">
                <h3 class="card-title">Ajouter une nouvelle section dans le menu A propos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post" action="{{Route('about.store')}}">
                    @csrf
                  <div class="form-group">
                    <label>Langue</label>
                    <select name="id_lang" class="form-control">
                        @foreach($langues as $langue)
                        <option value="{{$langue->id}}">{{$langue->lang}}</option>
                        @endforeach
                    </select>
                  </div>

                  <!-- text input -->
                  <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control" placeholder="Entrer ..." name="title">
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Contenu</label>
                    <textarea class="form-control" rows="3" placeholder="Entrer ..." name="content"></textarea>
                  </div>
                  
                <div style="text-align:right">
                    <button class="btn btn-default" type="submit">Sauvegarder</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>
@endsection