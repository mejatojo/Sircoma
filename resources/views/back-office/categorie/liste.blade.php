@extends('back-office.includePage')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


@endsection
@section('content')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des catégories</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                    <th>Images</th>
                    @foreach($langues as $langue)
                    <th>{{$langue->lang}}</th>
                    @endforeach
                    <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @foreach($categories as $categorie)
              <tr>
              <td><img src="{{asset('storage/'.$categorie->photo)}}" width="50px"></td>
                    @foreach($langues as $langue)
                    <td>
                      <span hidden>{{$exist=0}}</span>
                        @foreach($categories_langue as $langCat)
                            @if($langCat->id_lang==$langue->id and $langCat->id_cat==$categorie->id)
                            <span hidden>{{$exist=1}}</span>
                              <span style="float:left">
                               {{$langCat->name_category}} 
                              </span>
                            
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$langCat->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$langCat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('langues.update',[$langCat->id])}}" method="POST">
                              @method('PUT')
                              @csrf
                              <div class="form-group">
                                <label>{{$langue->lang}}</label>
                                <input type="text" name="name_category" class="form-control" value="{{$langCat->name_category}}">
                              </div>
                              <div style="float:right">
                                  <button type="submit" class="btn btn-primary">Modifier</button>
                              </div>               
                          </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Fin Modal -->
                @endif
                
                        @endforeach
                        @if($exist==0)
                        <span style="float:right">
                            <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter{{$langue->id}}"><i class="fa fa-edit"></i></a>
                        </span>
                            <!-- Modal -->
                        <div class="modal fade" id="ajouter{{$langue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <form action="/categories/store" method="POST">
                                      @csrf
                                      <div class="form-group">
                                        <label>{{$langue->lang}}</label>
                                        <input type="text" name="name_category" class="form-control" >
                                      </div>
                                      <input type="text" value="{{$langue->id}}" hidden name="langue">
                                      <input type="text" value="{{$categorie->id}}" hidden name="categorie">
                                      <div style="float:right">
                                          <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                      </div>
                                                 
                                  </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- Fin Modal -->
                            @endif
                    </td>
                    @endforeach
                    <td>
                        <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#modifierPhoto{{$categorie->id}}"><i class="fa fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer{{$categorie->id}}"><i class="fa fa-trash"></i></a>
                  <!-- Modal -->
                <div class="modal fade" id="modifierPhoto{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier la photo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" method="post" action="{{Route('category.update',[$categorie->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nouvelle photo</label>
                            <input type="file" class="form-control" name="image">
                          </div>
                          
                        <div style="text-align:right">
                            <button class="btn btn-default" type="submit">Modifier</button>
                        </div>
                      </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Fin Modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="supprimer{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer cette catégorie?
                    </div>
                    <div class="modal-footer">
                    <form action="{{route('category.destroy',[$categorie->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                    <button type="submit" class="btn btn-primary">Oui</button>               
                    </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </div>
                    </div>
                </div>
                </div>
                    </td>
                </tr>
              @endforeach
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
@endsection
@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [ 1, 'desc' ]
    });
  });
</script>
@endsection