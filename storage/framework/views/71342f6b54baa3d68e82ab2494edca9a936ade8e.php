
<?php $__env->startSection('title'); ?>
    Dévis
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    Dévis
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    Dévis
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="container">
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
                <h3 class="card-title">Liste des dévis envoyés</h3>
                <div class="card-tools">
                    <?php echo e($devis->links()); ?>

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
                        <?php $__empty_1 = true; $__currentLoopData = $devis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($devis->name); ?></td>
                                <td><?php echo e($devis->email); ?></td>
                                <td><?php echo e($devis->phone); ?></td>
                                <td><?php echo e($devis->type); ?></td>
                                <td><?php echo e($devis->created_at); ?></td>
                                <td><?php echo e($devis->type); ?></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                        data-target="#modal_look_<?php echo e($devis->id); ?>" style="width: fit-content;">
                                        Voir
                                    </button>
                                    <div class="modal fade" id="modal_look_<?php echo e($devis->id); ?>" aria-hidden="true"
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
                                                        <p>De <strong><?php echo e($devis->name); ?></strong></p>
                                                        <p>Envoyé le <i><?php echo e($devis->created_at); ?></i></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p>Email: <strong><?php echo e($devis->email); ?></strong></p>
                                                        <p>Téléphone: <strong><?php echo e($devis->phone); ?></strong></p>
                                                    </div>
                                                    <div>
                                                        <p>Type de projet: <strong><?php echo e($devis->type); ?></strong></p>
                                                    </div>

                                                    <div class="mt-3 p-2 bg-light ">
                                                        <p><?php echo e($devis->message); ?></p>
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
                                        data-target="#modal_destroy_<?php echo e($devis->id); ?>" style="width: fit-content;">
                                        Supprimer
                                    </button>

                                    <div class="modal fade" id="modal_destroy_<?php echo e($devis->id); ?>" aria-hidden="true"
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
                                                <form action="<?php echo e(route('manage_devis.destroy', $devis->id)); ?>"
                                                    method="post">
                                                    <div class="modal-body">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <div class="text-danger">
                                                            <h1>Attention!</h1>
                                                            <p>Vous êtes sur le point de supprimer le dévis
                                                                <strong><?php echo e($devis->name); ?></strong>. Voulez-vous
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <div class="alert alert-info">
                                    Aucun dévis pour le moment.
                                </div>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/devis.blade.php ENDPATH**/ ?>