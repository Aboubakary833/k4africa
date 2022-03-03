
<?php $__env->startSection('title'); ?>
    Utilisateurs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    Liste des utilisateurs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    utilisateurs
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <?php if($message = Session::get('error')): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>
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
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0"><?php echo e($user->name); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('storage/' . $user->profile)); ?>" alt="<?php echo e($user->name); ?>"
                                                class="img-circle" width="40">
                                        </td>
                                        <td><?php echo e($user->role->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->phone); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                                data-target="#modal_edit_<?php echo e($user->uuid); ?>" style="width: fit-content;">
                                                <i class="far fa-edit"></i>
                                                Editer
                                            </button>
                                            <div class="modal fade" id="modal_edit_<?php echo e($user->uuid); ?>"
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
                                                        <form action="<?php echo e(route('users.update', $user->uuid)); ?>" method="post"
                                                            enctype="multipart/form-data">
                                                            <?php echo method_field('PUT'); ?>
                                                            <div class="modal-body">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="form-group mb-3">
                                                                    <label for="name">Nom complet: </label>
                                                                    <input type="text" name="name" id="name"
                                                                        class="form-control"
                                                                        placeholder="Entrez le nom complet de l'utilisateur"
                                                                        value="<?php echo e($user->name); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email">Adresse email: </label>
                                                                    <input type="text" name="email" id="email"
                                                                        class="form-control"
                                                                        placeholder="Entrez l'adresse email de l'utilisateur"
                                                                        value="<?php echo e($user->email); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="phone">Numéro de téléphone: </label>
                                                                    <input type="tel" name="phone" id="phone"
                                                                        class="form-control"
                                                                        placeholder="Entrez le numéro de téléphone"
                                                                        value="<?php echo e($user->phone); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="role">Choisissez le rôle: </label>
                                                                    <select name="role_id" id="role" class="form-control"
                                                                        required>
                                                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($role->id); ?>" <?php if($user->role_id === $role->id): ?> selected <?php endif; ?>>
                                                                                <?php echo e($role->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                data-target="#modal_destroy_<?php echo e($user->uuid); ?>"
                                                style="width: fit-content;">
                                                <i class="fas fa-trash"></i>
                                                Supprimer
                                            </button>
                                            <div class="modal fade" id="modal_destroy_<?php echo e($user->uuid); ?>" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Suppression d'un utilisateur</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <form action="<?php echo e(route('users.destroy', $user->uuid)); ?>" method="post">
                                                    <div class="modal-body">
                                                      <?php echo csrf_field(); ?>
                                                      <?php echo method_field('DELETE'); ?>
                                                      <div class="text-danger">
                                                        <h1>Attention!</h1>
                                                        <p>Vous êtes sur le point de supprimer l'utilisateur <strong><?php echo e($user->name); ?></strong>. Cela engendrera la supression de toutes les données rélative à cet dernier. Voulez-vous vraiment procéder à la suppression ?</p>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <form action="<?php echo e(route('users.store')); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="name">Nom complet: </label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Entrez le nom complet de l'utilisateur"
                                <?php if(old('name')): ?> value="<?php echo e(old('name')); ?>" <?php endif; ?> required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Adresse email: </label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Entrez l'adresse email de l'utilisateur"
                                <?php if(old('email')): ?> value="<?php echo e(old('email')); ?>" <?php endif; ?> required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Numéro de téléphone: </label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Entrez le numéro de téléphone"
                                <?php if(old('phone')): ?> value="<?php echo e(old('phone')); ?>" <?php endif; ?> required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Choisissez le rôle: </label>
                            <select name="role_id" id="role" class="form-control" required>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_script'); ?>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/users.blade.php ENDPATH**/ ?>