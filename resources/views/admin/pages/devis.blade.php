@extends('admin.layouts.main')
@section('title')
    Dévis
@endsection
@section('bigTitle')
    Dévis
@endsection
@section('pageName')
    Dévis
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
                <h3 class="card-title">Liste des dévis envoyés</h3>
                <div class="card-tools">
                    {{ $devis->links() }}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Voir</th>
                            <th>Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($devis as $devis)
                            <tr>
                                <td>{{ $devis->name }}</td>
                                <td>{{ $devis->email }}</td>
                                <td>{{ $devis->phone }}</td>
                                <td>{{ $devis->type }}</td>
                                <td>{{ $devis->created_at }}</td>
                                <td>{{ $devis->type }}</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                        data-target="#modal_look_{{ $devis->id }}" style="width: fit-content;">
                                        Voir
                                    </button>
                                    <div class="modal fade" id="modal_look_{{ $devis->id }}" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Voir le dévis</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p>De <strong>{{ $devis->name }}</strong></p>
                                                        <p>Envoyé le <i>{{ $devis->created_at }}</i></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p>Email: <strong>{{ $devis->email }}</strong></p>
                                                        <p>Téléphone: <strong>{{ $devis->phone }}</strong></p>
                                                    </div>
                                                    <div>
                                                        <p>Type de projet: <strong>{{ $devis->type }}</strong></p>
                                                    </div>

                                                    <div class="mt-3 p-2 bg-light ">
                                                        <p>{{ $devis->message }}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                        data-target="#modal_destroy_{{ $devis->id }}" style="width: fit-content;">
                                        Supprimer
                                    </button>

                                    <div class="modal fade" id="modal_destroy_{{ $devis->id }}" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Suppression de dévis</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('manage_devis.destroy', $devis->id) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="text-danger">
                                                            <h1>Attention!</h1>
                                                            <p>Vous êtes sur le point de supprimer le dévis
                                                                <strong>{{ $devis->name }}</strong>. Voulez-vous
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
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <div class="alert alert-info">
                                    Aucun dévis pour le moment.
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
