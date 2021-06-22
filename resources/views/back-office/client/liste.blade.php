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
          <h3 class="card-title">Liste des clients
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter"><i class="fa fa-plus"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajout d'un client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <!-- text input -->
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
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
                <th>Photos</th>
            </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr>
                <td><img src="{{asset('storage/'.$client->image)}}" alt="" width="100px">
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#supprimer{{$client->id}}"><i class="fa fa-trash"></i></a>
                              </span>
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$client->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('client.update',[$client->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nouvelle mage</label>
                                <input type="file" class="form-control" name="image">
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
                    <!-- Modal -->
                    <div class="modal fade" id="supprimer{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer cet client?
                    </div>
                    <div class="modal-footer">
                    <form action="{{route('client.destroy',[$client->id])}}" method="POST">
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