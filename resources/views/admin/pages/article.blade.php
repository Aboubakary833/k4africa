@extends('admin.layouts.main')
@section('title')
    Blog - {{ $article->title }}
@endsection
@section('bigTitle')
    {{ $article->title }}
@endsection
@section('pageName')
    {{ $article->title }}
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
                    <form action="{{ route('manage_blog.update', $article->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Titre de la sous page: </label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Entrez le title de l'article" value="{{ $article->title }}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="path">chemin de la sous page: </label>
                            <input type="text" name="path" class="form-control" id="path"
                                placeholder="Entrez le chemin de l'article" value="{{ $article->slug->value }}"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="pathname">Nom du chemin: </label>
                            <input type="text" name="pathname" class="form-control" id="pathname"
                                placeholder="Entrez le nom du chemin de la sous page" value="{{ $article->slug->name }}"
                                required>
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
                        Contenu de l'article
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('updateArticleContent') }}" method="post">
                        @csrf
                        <input type="hidden" name="article" value="{{ $article->id }}" required>
                        <textarea id="summernote" name="content">
                  {{ $article->content }}
                </textarea>
                        <button class="btn btn-primary" type="submit">Envoyer la modification</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Auteur</th>
              <th>Commentaire</th>
              <th>Date de publication</th>
              <th>Suppression</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($article->comments as $comment)
              <tr>
                  <td>{{ $comment->user->name }}</td>
                  <td>{{ $comment->content }}</td>
                  <td>{{ $comment->created_at }}</td>
                  <td>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#modal_destroy_{{ $comment->id }}">Supprimer</button>    
                  </td> 
                  <div class="modal fade" id="modal_destroy_{{ $comment->id }}" aria-hidden="true"
                      style="display: none;">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Suppression de commentaire</h4>
                                  <button type="button" class="close" data-dismiss="modal"
                                      aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <form action="{{ route('comments.destroy', $comment->id) }}"
                                  method="post">
                                  <div class="modal-body">
                                      @csrf
                                      @method('DELETE')
                                      <div class="text-danger">
                                          <h1>Attention!</h1>
                                          <p>Vous êtes sur le point de supprimer le commentaire de
                                              <strong>{{ $comment->user->name }}</strong>. Voulez-vous
                                              vraiment procéder à la suppression ?</p>
                                      </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default"
                                          data-dismiss="modal">Non</button>
                                      <button type="submit"
                                          class="btn btn-danger modal_form_submit_btn">Oui</button>
                                  </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
              </tr>
            @empty
               <tr>
                   <div class="alert alert-info">
                      Aucun commentaire pour cet article.
                   </div>
              </tr> 
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
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
