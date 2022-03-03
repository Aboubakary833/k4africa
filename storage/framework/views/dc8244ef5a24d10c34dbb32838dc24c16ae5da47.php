
<?php $__env->startSection('title'); ?>
    NewsLetters
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    NewsLetters
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    NewsLetters
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
                <h3 class="card-title">Liste des inscris au NewsLetter</h3>
                <div class="card-tools">
                    <?php echo e($newsletters->links()); ?>

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
                        <?php $__empty_1 = true; $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsletter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($newsletter->name); ?></td>
                                <td><?php echo e($newsletter->email); ?></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                        data-target="#modal_destroy_<?php echo e($newsletter->id); ?>" style="width: fit-content;">
                                        Supprimer
                                    </button>

                                    <div class="modal fade" id="modal_destroy_<?php echo e($newsletter->id); ?>"
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
                                                <form action="<?php echo e(route('manage_newsletter.destroy', $newsletter->id)); ?>"
                                                    method="post">
                                                    <div class="modal-body">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <div class="text-danger">
                                                            <h1>Attention!</h1>
                                                            <p>Vous êtes sur le point de supprimer l'inscris
                                                                <strong><?php echo e($newsletter->name); ?></strong>. Voulez-vous
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <div class="alert alert-info">
                                    Aucun inscris pour le moment.
                                </div>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/newsletters.blade.php ENDPATH**/ ?>