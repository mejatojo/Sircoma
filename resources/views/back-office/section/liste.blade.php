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
          <h3 class="card-title">Liste des sections
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#ajouter"><i class="fa fa-plus"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajout d'un section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('section.store')}}" method="POST">
                              @csrf
                              <!-- text input -->
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="form-group">
                                <label>Paragraphe</label>
                                <textarea  class="form-control" name="paragraphe"></textarea>
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
                                <label>Référence</label>
                                <select type="text" class="form-control" name="reference">
                                    <option value="Présentation">Présentation</option>
                                    <option value="Marques">Marques</option>
                                    <option value="Partenaires">Partenaires</option>
                                    <option value="Point de vente">Point de vente</option>
                                    <option value="Contactez-nous">Contactez-nous</option>
                                    <option value="Historiques">Historiques</option>  
                                    <option value="Contact">Contact</option>
                                    <option value="Map">Map</option>
                                    <option value="Clients">Clients</option>
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
                <th>Titre</th>
                <th>Paragraphe</th>
                <th>Référence</th>
                <th>Langue</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @foreach($sections as $section)
              <tr>
                <td>
                    {{$section->titre}}
                </td>
                <td>
                    {{$section->paragraphe}}
                </td>
                <td>
                    {{$section->reference}}
                </td>
                <td>
                    {{$section->lang}}
                </td>
                <td>
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$section->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <form action="{{route('section.update',[$section->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- text input -->
                                      <div class="form-group">
                                          <label>Titre</label>
                                          <input type="text" class="form-control" name="titre" value="{{$section->titre}}">
                                      </div>
                                      <div class="form-group">
                                          <label>Paragraphe</label>
                                          <textarea  class="form-control" name="paragraphe">{{$section->paragraphe}}</textarea>
                                      </div>
                                      <div class="form-group">
                                          <label>Langue</label>
                                          <select type="text" class="form-control" name="id_lang">
                                              @foreach($langues as $langue)
                                                @if($langue->id==$section->id_lang)
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