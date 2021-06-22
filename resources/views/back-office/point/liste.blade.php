@extends('back-office.includePage')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


@endsection
@section('content')
<div class="container">
    <div class="row">
<div  class="card card-warning col-lg-8 offset-lg-2 col-md-12" style="margin-top:100px">
        <div class="card-header">
          <h3 class="card-title">Liste des points de vente
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter"><i class="fa fa-plus"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajout d'un point de vente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('point.store')}}" method="POST">
                              @csrf
                            <div class="form-group">
                                <label>Point de vente</label>
                                <textarea  class="form-control" name="point"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Langue</label>
                                <select type="text" class="form-control" name="id_lang">
                                    @foreach($langues as $langue)
                                    <option value="{{$langue->id}}">{{$langue->lang}}</option>
                                    @endforeach
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
                <th>Point de vente</th>
                <th>Langue</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @foreach($points as $point)
              <tr>
                <td>
                    {{$point->point}}
                </td>
                <td>
                    {{$point->lang}}
                </td>
                <td>
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$point->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$point->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <form action="{{route('point.update',[$point->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                      <div class="form-group">
                                          <label>Point de vente</label>
                                          <textarea  class="form-control" name="point">{{$point->point}}</textarea>
                                      </div>
                                      <div class="form-group">
                                          <label>Langue</label>
                                          <select type="text" class="form-control" name="id_lang">
                                              @foreach($langues as $langue)
                                                @if($langue->id==$point->id_lang)
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