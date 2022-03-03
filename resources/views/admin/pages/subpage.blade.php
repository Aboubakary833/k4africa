@extends('admin.layouts.main')
@section('title')
    {{$subpage->page->name . '-' . $subpage->name}}
@endsection
@section('bigTitle')
    {{$subpage->name}}
@endsection
@section('pageName')
    {{$subpage->name}}
@endsection

@section('main')
@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $message }}
        </div>
    @endif

<div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Modifier les éléments principaux
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{ route('subpages.update', $subpage->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group mb-2">
              <label for="name">Nom de la sous page: </label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Entrez le nom de la sous page" value="{{ $subpage->name }}" required>
            </div>
            <div class="form-group mb-2">
              <label for="title">Titre de la sous page: </label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Entrez le title de la sous page" value="{{ $subpage->title }}" required>
            </div>
            <div class="form-group mb-2">
              <label for="path">chemin de la sous page: </label>
              <input type="text" name="path" class="form-control" id="path" placeholder="Entrez le chemin de la sous page" value="{{ $subpage->slug->value }}" required>
            </div>
            <div class="form-group mb-2">
              <label for="pathname">Nom du chemin: </label>
              <input type="text" name="pathname" class="form-control" id="pathname" placeholder="Entrez le nom du chemin de la sous page" value="{{ $subpage->slug->name }}" required>
            </div>
            <button class="btn btn-primary" type="submit">Envoyer la modification</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Contenu de la sous page
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{ route('subpages.updateContent') }}" method="post">
            @csrf
            <input type="hidden" name="subpage" value="{{ $subpage->id }}" required>
            <textarea id="summernote" name="content">
              {{ $subpage->content }}
            </textarea>
            <button class="btn btn-primary" type="submit">Envoyer la modification</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>

@endsection
@section('additional_script')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
      $('#summernote').summernote()
    })
  </script>
@endsection