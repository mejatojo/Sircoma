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
          <h3 class="card-title">Liste des langues
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter"><i class="fa fa-plus"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('langues.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label></label>
                                <input type="text" name="lang" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="drapeau">
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
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Langues</th>
            </tr>
            </thead>
            <tbody>
              @foreach($langues as $langue)
              <tr>
                <td>{{$langue->lang}} <img src="{{asset('storage/'.$langue->drapeau)}}" width="30px">
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#supprimer{{$langue->id}}"><i class="fa fa-trash"></i></a>
                              </span>
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$langue->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$langue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('updateLang',[$langue->id])}}" method="POST" enctype="multipart/form-data">
                              @method('PUT')
                              @csrf
                              <div class="form-group">
                                <label></label>
                                <input type="text" name="lang" class="form-control" value="{{$langue->lang}}">
                              </div>
                              <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="drapeau">
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
                    <!-- Modal -->
                    <div class="modal fade" id="supprimer{{$langue->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('langues.destroy',[$langue->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                    <button type="submit" class="btn btn-primary">Oui</button>               
                    </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
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