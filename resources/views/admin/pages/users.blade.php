@extends('admin.layouts.main')
@section('title')
    Utilisateurs
@endsection
@section('bigTitle')
    Liste des utilisateurs
@endsection
@section('pageName')
    utilisateurs
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
            <h3 class="card-title mt-1">Liste des utilisateurs</h3>
            <div class="card-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_user">Ajouter un
                    utilisateur</button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="data_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <table id="usersData" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Nom: activate to sort column descending">Nom
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Profil: activate to sort column ascending">Profil</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Role: activate to sort column ascending">Role</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Email: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Téléphone: activate to sort column ascending">Téléphone</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending">Edition</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending">Suppression</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $user->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $user->profile) }}" alt="{{ $user->name }}"
                                                class="img-circle" width="40">
                                        </td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                                data-target="#modal_edit_{{ $user->uuid }}" style="width: fit-content;">
                                                <i class="far fa-edit"></i>
                                                Editer
                                            </button>
                                            <div class="modal fade" id="modal_edit_{{ $user->uuid }}"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editer un utilisateur</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('users.update', $user->uuid) }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="form-group mb-3">
                                                                    <label for="name">Nom complet: </label>
                                                                    <input type="text" name="name" id="name"
                                                                        class="form-control"
                                                                        placeholder="Entrez le nom complet de l'utilisateur"
                                                                        value="{{ $user->name }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email">Adresse email: </label>
                                                                    <input type="text" name="email" id="email"
                                                                        class="form-control"
                                                                        placeholder="Entrez l'adresse email de l'utilisateur"
                                                                        value="{{ $user->email }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="phone">Numéro de téléphone: </label>
                                                                    <input type="tel" name="phone" id="phone"
                                                                        class="form-control"
                                                                        placeholder="Entrez le numéro de téléphone"
                                                                        value="{{ $user->phone }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="role">Choisissez le rôle: </label>
                                                                    <select name="role_id" id="role" class="form-control"
                                                                        required>
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->id }}" @if($user->role_id === $role->id) selected @endif>
                                                                                {{ $role->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="password">Mot de passe: </label>
                                                                    <input type="password" name="password" id="password"
                                                                        class="form-control"
                                                                        placeholder="Entrez le mot de passe">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="profile">Photo de profil</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="profile"
                                                                                class="custom-file-input" id="profile"
                                                                                accept="image/jpeg, .image/jpg, image/png">
                                                                            <label class="custom-file-label"
                                                                                for="profile">Choisir une image</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Fermer</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary modal_form_submit_btn">Modifier</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                                data-target="#modal_destroy_{{ $user->uuid }}"
                                                style="width: fit-content;">
                                                <i class="fas fa-trash"></i>
                                                Supprimer
                                            </button>
                                            <div class="modal fade" id="modal_destroy_{{ $user->uuid }}" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Suppression d'un utilisateur</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{ route('users.destroy', $user->uuid) }}" method="post">
                                                    <div class="modal-body">
                                                      @csrf
                                                      @method('DELETE')
                                                      <div class="text-danger">
                                                        <h1>Attention!</h1>
                                                        <p>Vous êtes sur le point de supprimer l'utilisateur <strong>{{ $user->name }}</strong>. Cela engendrera la supression de toutes les données rélative à cet dernier. Voulez-vous vraiment procéder à la suppression ?</p>
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
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal_add_user" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajout d'utilisateur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nom complet: </label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Entrez le nom complet de l'utilisateur"
                                @if (old('name')) value="{{ old('name') }}" @endif required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Adresse email: </label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Entrez l'adresse email de l'utilisateur"
                                @if (old('email')) value="{{ old('email') }}" @endif required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Numéro de téléphone: </label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Entrez le numéro de téléphone"
                                @if (old('phone')) value="{{ old('phone') }}" @endif required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Choisissez le rôle: </label>
                            <select name="role_id" id="role" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe: </label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Entrez le mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="profile">Photo de profil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="profile" class="custom-file-input" id="profile"
                                        accept="image/jpeg, .image/jpg, image/png">
                                    <label class="custom-file-label" for="profile">Choisir une image</label>
                                </div>
                            </div>
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
@endsection

@section('additional_script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            $("#usersData").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": true,
                "lengthMenu": [10, 25, 50, 75, 100],
                "buttons": ["excel", "pdf"],
                "language": {
                    "searchPlaceholder": "Rechercher ...",
                    "lengthMenu": "Afficher _MENU_ enregistrement par page",
                    "zeroRecords": "Aucun utilisateur trouvé",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "",
                    "infoFiltered": "(Filtré à partir de la liste _MAX_.)",
                    "lengthMenu": "Show _MENU_ entries",
                    "loadingRecords": "Chargement...",
                    "processing": "En cours...",
                    "search": "_INPUT_",
                    "placeholder": "Rechercher",
                    "info": "_TOTAL_ enregistrement(s)",
                    "infoEmpty": "0 enregistrement",
                    "zeroRecords": "Aucun enregistrement trouvé",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    },
                }
            }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
