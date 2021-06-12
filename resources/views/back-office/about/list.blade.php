@extends('back-office.includePage')
@section('content')
@foreach($langues as $langue)
<h5 class="mt-4 mb-2">{{$langue->lang}}</h5>
<div class="container">
    <div class="row">
        @foreach($abouts as $about)
        @if($about->id_lang==$langue->id)
        <div class="col-md-3">
            <div class="card card-warning card-outline" style="height: 100%;">
              <div class="card-header">
                <h3 class="card-title">{{$about->title}}</h3>

                <div class="card-tools">
                  <a type="button" class="btn" href="/about/{{$about->id}}/edit"><i class="fa fa-edit"></i></a>
                  <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#supprimer{{$about->id}}"><i class="fa fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="supprimer{{$about->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer cette section?
                    </div>
                    <div class="modal-footer">
                    <form action="{{route('about.destroy',[$about->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                    <button type="submit" class="btn btn-primary">Oui</button>               
                    </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo substr($about->content,0,100)."...";?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        @endif
        @endforeach
    </div>
</div>
@endforeach
@endsection