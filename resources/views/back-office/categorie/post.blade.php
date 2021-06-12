@extends('back-office.includePage')
@section('content')
<div class="container">
    <div class="row">
            <div class="card card-warning col-lg-6 offset-lg-3 col-md-12" style="margin-top:100px">
              <div class="card-header">
                <h3 class="card-title">Ajouter une nouvelle catégorie</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post" action="{{Route('category.store')}}" enctype="multipart/form-data">
                    @csrf

                  <!-- text input -->
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
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