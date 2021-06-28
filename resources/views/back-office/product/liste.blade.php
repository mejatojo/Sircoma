@extends('back-office.includePage')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


@endsection
@section('content')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des produits</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                    <th>Images</th>
                    <th>Catégorie</th>
                    @foreach($langues as $langue)
                    <th>{{$langue->lang}}</th>
                    @endforeach
                    <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
              <td><img src="{{asset('storage/'.$product->photo_product)}}" width="50px"></td>
              <td>
                    @foreach($categories as $category)
                    @if($category->id==$product->id_category)
                    {{$category->name_category}}
                    @endif
                    @endforeach
              </td>
                    @foreach($langues as $langue)
                    <td>
                      <span hidden>{{$exist=0}}</span>
                        @foreach($product_langues as $langProduct)
                            @if($langProduct->id_lang==$langue->id and $langProduct->id_product==$product->id)
                            <span hidden>{{$exist=1}}</span>
                              <span style="float:left">
                               <a style="color:rgb(89, 89, 231);font-weight:bold"><u>{{$langProduct->name_product}}</u></a>
                               <br>{{$langProduct->description_product}}<br>
                               Prix : {{$langProduct->price}}
                              </span>
                            
                              <span style="float:right">
                                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#modifier{{$langProduct->id}}"><i class="fa fa-edit"></i></a>
                              </span>
                <!-- Modal -->
                <div class="modal fade" id="modifier{{$langProduct->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          
                        <form action="{{route('product_controller.update',[$langProduct->id])}}" method="POST">
                                    
                                      @csrf
                                      @method('PUT')
                                      <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="name_product" class="form-control" value="{{$langProduct->name_product}}">
                                      </div>
                                      <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" name="description_product" class="form-control" >{{$langProduct->description_product}}</textarea>
                                      </div>
                                      <div class="form-group">
                                        <label>Prix</label>
                                        <input type="text" class="form-control" name="price" value="{{$langProduct->price}}">
                                    </div>
                                      <input type="text" value="{{$langue->id}}" hidden name="id_lang">
                                      <input type="text" value="{{$product->id}}" hidden name="id_product">
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
                                  <form action="{{route('product_controller.store')}}" method="POST">
                                      @csrf
                                      <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="name_product" class="form-control" >
                                      </div>
                                      <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" name="description_product" class="form-control" ></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label>Prix</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                      <input type="text" value="{{$langue->id}}" hidden name="id_lang">
                                      <input type="text" value="{{$product->id}}" hidden name="id_product">
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
                        <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#modifierPhoto{{$product->id}}"><i class="fa fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer{{$product->id}}"><i class="fa fa-trash"></i></a>
                  <!-- Modal -->
                <div class="modal fade" id="modifierPhoto{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" method="post" action="{{Route('product.update',[$product->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <!-- text input -->
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="photo_product">
                        </div>
                        <input type="text" value="{{$product->id}}" name="id_product" hidden>
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select name="id_category" class="form-control">
                                @foreach($categories as $category)
                                @if($category->id==$product->id_category)
                                <option value="{{$category->id}}" selected>{{$category->name_category}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name_category}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div style="text-align:right">
                            <button class="btn btn-default" type="submit">Sauvegarder</button>
                        </div>
                    </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Fin Modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="supprimer{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer cet produit?
                    </div>
                    <div class="modal-footer">
                    <form action="{{route('product.destroy',[$product->id])}}" method="POST">
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