@extends('admin.layouts.main')
@section('title')
    NewsLetters
@endsection
@section('bigTitle')
    NewsLetters
@endsection
@section('pageName')
    NewsLetters
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
                <h3 class="card-title">Liste des inscris au NewsLetter</h3>
                <div class="card-tools">
                    {{ $newsletters->links() }}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($newsletters as $newsletter)
                            <tr>
                                <td>{{ $newsletter->name }}</td>
                                <td>{{ $newsletter->email }}</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                        data-target="#modal_destroy_{{ $newsletter->id }}" style="width: fit-content;">
                                        Supprimer
                                    </button>

                                    <div class="modal fade" id="modal_destroy_{{ $newsletter->id }}"
                                        aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Suppression de dévis</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('manage_newsletter.destroy', $newsletter->id) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="text-danger">
                                                            <h1>Attention!</h1>
                                                            <p>Vous êtes sur le point de supprimer l'inscris
                                                                <strong>{{ $newsletter->name }}</strong>. Voulez-vous
                                                                vraiment procéder à la suppression ?
                                                            </p>
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
                                    Aucun inscris pour le moment.
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
