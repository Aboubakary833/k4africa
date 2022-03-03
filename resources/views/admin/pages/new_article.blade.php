@extends('admin.layouts.main')
@section('title')
    Blog - Nouveau article
@endsection
@section('bigTitle')
    Nouveau article
@endsection
@section('pageName')
    Nouveau article
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
                    <form action="{{ route('manage_blog.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Titre de la sous page: </label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Entrez le title de l'article" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="path">chemin de la sous page: </label>
                            <input type="text" name="path" class="form-control" id="path"
                                placeholder="Entrez le chemin de l'article" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="pathname">Nom du chemin: </label>
                            <input type="text" name="pathname" class="form-control" id="pathname"
                                placeholder="Entrez le nom du chemin de la sous page" required>
                        </div>

                        <div class="form-group">
                            <textarea id="summernote" name="content" required>
                                </textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@endsection
@section('additional_script')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#summernote').summernote()
        })
    </script>
@endsection
