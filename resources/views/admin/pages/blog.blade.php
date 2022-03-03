@extends('admin.layouts.main')
@section('title')
    Blog
@endsection
@section('bigTitle')
    Blog
@endsection
@section('pageName')
    Blog
@endsection

@section('main')
    <div class="container">
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

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des articles</h3>
              <div class="card-tools">
                <a href="{{ route('manage_blog.create') }}" class="btn btn-primary">Ajouter un article</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Commentaire</th>
                    <th>Date de publication</th>
                    <th>Edition</th>
                    <th>Suppression</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ count($article->comments) }}</td>
                        <td>{{ $article->created_at }}</td> 
                        <td>
                            <a href="{{ route('manage_blog.edit', $article->id) }}" class="btn btn-info">Editer</a>    
                        </td> 
                        <td>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal_destroy_{{ $article->id }}">Supprimer</button>    
                        </td> 
                        <div class="modal fade" id="modal_destroy_{{ $article->id }}" aria-hidden="true"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Suppression d'article</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('manage_blog.destroy', $article->id) }}"
                                        method="post">
                                        <div class="modal-body">
                                            @csrf
                                            @method('DELETE')
                                            <div class="text-danger">
                                                <h1>Attention!</h1>
                                                <p>Vous êtes sur le point de supprimer l'article
                                                    <strong>{{ $article->title }}</strong>. Voulez-vous
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
                            Aucun article n'a encore été publié.
                         </div>
                    </tr> 
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection