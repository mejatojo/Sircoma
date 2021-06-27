@extends('back-office.includePage')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


@endsection
@section('content')
<div class="container">
    <div class="row">
<div  class="card card-warning col-lg-6 offset-lg-3 col-md-12" style="margin-top:100px">
        <div class="card-header">
          <h3 class="card-title">Liste des menus
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter"><i class="fa fa-plus"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajout d'un menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('menu.store')}}" method="POST">
                              @csrf
                              <!-- text input -->
                            <div class="form-group">
                                <label>Libellé</label>
                                <input type="text" class="form-control" name="libelle">
                            </div>
                            <div class="form-group">
                                <label>Langue</label> 
                                <select type="text" class="form-control" name="id_lang">
                                    @foreach($langues as $langue)
                                    <option value="{{$langue->id}}">{{$langue->lang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">     
                                <label>Page</label>
                                <select type="text" class="form-control" name="reference">
                                    <option value="Accueil">Accueil</option>
                                    <option value="A propos">A propos</option>
                                    <option value="Produits">Produits</option>
                                    <option value="Clients">Clients</option>
                                    <option value="Contact">Contact</option>
                                    <option value="Langue">Langue</option>
                              </select>
                            </div>
                              <div style="float:right">
                                  <button type="submit" class="btn btn-primary">Ajouter</button>
                              </div>               
                          </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Fin Modal -->
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Libellé</th>
                <th>Langue</th>
                <th>Page</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @foreach($menus as $menu)
              <tr>
                <td>
                    {{$menu->libelle}}
                </td>
                <td>
                    {{$menu->lang}}
                </td>
                <td>
                    {{$menu->reference}}
                </td>
                <td>
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$menu->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <form action="{{route('menu.update',[$menu->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- text input -->
                                      <div class="form-group">
                                          <label>Libellé</label>
                                          <input type="text" class="form-control" name="libelle" value="{{$menu->libelle}}">
                                      </div>
                                      <div class="form-group">
                                          <label>Langue</label>
                                          <select type="text" class="form-control" name="id_lang">
                                              @foreach($langues as $langue)
                                                @if($langue->id==$menu->id_lang)
                                                <option value="{{$langue->id}}" selected>{{$langue->lang}}</option>
                                                @else
                                                <option value="{{$langue->id}}">{{$langue->lang}}</option>
                                                @endif
                                              @endforeach
                                          </select>
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
                    
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
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