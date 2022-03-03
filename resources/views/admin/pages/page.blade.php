@extends('admin.layouts.main')
@section('title')
    {{$page->name}}
@endsection
@section('bigTitle')
    Gestion de page | {{$page->name}}
@endsection
@section('pageName')
    page utilisateur {{$page->name}}
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
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Page - {{$page->name}}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_edit_page">
          Modifier
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row align-items-center">
          <div class="col-12 col-md-6"> 
            <h2>{{ $page->title ?? "Auncun titre disponible pour cette page!" }}</h2>
          </div>
          <div class="col-12 col-md-6">
            @if (!$page->image)
            <img src="{{ asset('assets/images/hero/hero.png') }}" alt="default" width="100%">
            @else
            <img src="{{ asset('storage/' . $page->image) }}" alt="default" width="100%">
            @endif
          </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Contenus additionnels</h3>
      <div class="card-tools">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_role">Ajouter un contenu</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Nom</th>
            <th>Contenu</th>
            <th>Edition</th>
            <th>Suppression</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($additional_contents as $content)
          <tr>
            <td>{{$content->id}}.</td>
            <td>{{$content->name}}</td>
            <td>{{$content->content}}</td>
            <td>
              <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal_edit_{{ $content->id }}" style="width: fit-content;">
                <i class="far fa-edit"></i>
                Editer
              </button>
              <div class="modal fade" id="modal_edit_{{ $content->id }}" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Modification du contenu</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="{{ route('additional_content.update', $content->id) }}" method="post">
                    <div class="modal-body">
                      @csrf
                      @method('PUT')
                      <div class="form-group mb-3">
                        <label for="name">Nom du contenu</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Nom du role" value="{{ $content->name }}" required>
                      </div>
                      <div class="form-group mb-3">
                        <label for="content">Modifier le contenu</label>
                          <input type="text" name="content" id="content" class="form-control" placeholder="Nom du role" value="{{ $content->content }}" required>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                  </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </td>
            @if (!$page->name === "Accueil")
            <td>
              <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_destroy_{{ $content->id }}" style="width: fit-content;">
                <i class="fas fa-trash"></i>
                Supprimer
              </button>

              <div class="modal fade" id="modal_destroy_{{ $content->id }}" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Suppression du contenu</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="{{ route('additional_content.destroy', $content->id) }}" method="post">
                    <div class="modal-body">
                      @csrf
                      @method('DELETE')
                      <div class="text-danger">
                        <h1>Attention!</h1>
                        <p>Vous êtes sur le point de supprimer le contenu <strong>{{ $content->name }}</strong>. Cela engendrera la supression de ce contenu au niveau de la page <strong>{{ $page->name }}</strong></p>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                      <button type="submit" class="btn btn-danger modal_form_submit_btn">Oui</button>
                    </div>
                  </div>
                </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </td>
            @endif
          </tr>
          @empty
              <tr>
                <div class="alert alert-warning mx-auto">
                  Il n'y a aucun contenu additionnel disponible pour cette page!
                </div>
              </tr>
          @endforelse
        </tbody>
      </table>
      <div class="modal fade" id="modal_add_role" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajout de contenu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="{{ route('additional_content.store') }}" method="post">
              <input type="hidden" name="page" value="{{ $page->id }}" required>
            <div class="modal-body">
              @csrf
              <div class="form-group mb-3">
                <label for="name">Nom du contenu: </label>
                <input type="text" name="name" class="form-control" placeholder="Entrez le nom du contenu" required>
            </div>
              <div class="form-group mb-3">
                <label for="content">Le contenu: </label>
                <textarea name="content" id="content" cols="30" rows="4" class="form-control" placeholder="Entrez le contenu" required></textarea>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary modal_form_submit_btn">Ajouter</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  @if (!in_array($page->id, [1, 4, 5]))
      <!-- Subpages -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sous pages</h3>

      <div class="card-tools">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_subpage">Ajouter une sous page</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Titre</th>
            <th>Edition</th>
            <th>Suppression</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($page->subpages as $subpage)
              <tr>
                <td>{{ $subpage->id }}</td>
                <td>{{ $subpage->name }}</td>
                <td>{{ $subpage->title }}</td>
                <td>
                  <a class="btn btn-info" href="{{ route('subpages.edit', $subpage->id) }}">
                    <i class="fas fa-edit"></i>
                    Editer
                  </a>
                </td>
                <td>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_subpage_{{ $subpage->id }}">
                    <i class="fas fa-trash"></i>
                    Supprimer
                  </button>
                </td>
                <div class="modal fade" id="modal_delete_subpage_{{ $subpage->id }}" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Suppression de la sous page</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form action="{{ route('subpages.destroy', $subpage->id) }}" method="post">
                      <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <div class="text-danger">
                          <h1>Attention!</h1>
                          <p>Vous êtes sur le point de supprimer la sous page <strong>{{ $subpage->title }}</strong>. Cela engendrera la supression de cette sous section au niveau de la page <strong>{{ $page->name }}</strong></p>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                        <button type="submit" class="btn btn-danger modal_form_submit_btn">Oui</button>
                      </div>
                    </div>
                  </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              </tr>
          @empty
              
          @endforelse
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- /Subpages -->
  @endif

  <div class="modal fade" id="modal_edit_page" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifer le titre et/ou l'image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('page.update', $page->id) }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <div class="form-group mb-1">
            <textarea name="title" id="title" cols="30" rows="4" class="form-control" placeholder="Titre de la page" required>{{ $page->title }}</textarea>
          </div>
          <div class="custom-file">
            <input type="file" name="image"
                class="custom-file-input" id="image"
                accept="image/jpeg, .image/jpg, image/png">
            <label class="custom-file-label"
                for="image">Choisir une image</label>
        </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary modal_form_submit_btn">Modifier</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @if (!in_array($page->id, [1, 4, 5]))
  <div class="modal fade" id="add_subpage" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajout d'une sous page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('subpages.store') }}" method="post">
        <div class="modal-body">
          @csrf
          <input type="hidden" name="page" value="{{ $page->id }}" required>
          <div class="form-group mb-1">
            <label for="name">Nom de la sous page: </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Entrez le nom de la sous page" required>
          </div>
          <div class="form-group mb-1">
            <label for="title">Titre de la sous page: </label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Entrez le titre de la sous page" required>
          </div>
          <div class="form-group mb-1">
            <label for="path">Chemin de la sous page: </label>
            <input type="text" class="form-control" name="path" id="path" placeholder="Entrez le chemin de la sous page" required>
          </div>
          <div class="form-group mb-1">
            <label for="path">Nom du chemin de la sous page: </label>
            <input type="text" class="form-control" name="pathname" id="pathname" placeholder="Entrez le nom du chemin de la sous page" required>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary modal_form_submit_btn">Ajouter</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endif
@endsection

@section('additional_script')

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
  $(function() {
  bsCustomFileInput.init();
});
</script>

@endsection