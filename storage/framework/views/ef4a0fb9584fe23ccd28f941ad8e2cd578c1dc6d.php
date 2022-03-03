
<?php $__env->startSection('title'); ?> Roles <?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?> Roles d'utilisateur <?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?> Roles <?php $__env->stopSection(); ?>

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
      <h3 class="card-title">Liste des roles d'utilisateur</h3>
      <div class="card-tools">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_role">Ajouter un role</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Nom</th>
            <th>Edition</th>
            <th>Suppression</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($role->id); ?>.</td>
            <td><?php echo e($role->name); ?></td>
            <td>
              <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal_edit_<?php echo e($role->id); ?>" style="width: fit-content;">
                <i class="far fa-edit"></i>
                Editer
              </button>
              <div class="modal fade" id="modal_edit_<?php echo e($role->id); ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Modification de role</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="<?php echo e(route('roles.update', $role->id)); ?>" method="post">
                    <div class="modal-body">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="input-group">
                          <input type="text" name="name" class="form-control" placeholder="Nom du role" value="<?php echo e($role->name); ?>" required>
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
            <td>
              <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_destroy_<?php echo e($role->id); ?>" style="width: fit-content;">
                <i class="fas fa-trash"></i>
                Supprimer
              </button>

              <div class="modal fade" id="modal_destroy_<?php echo e($role->id); ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Suppression de role</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="post">
                    <div class="modal-body">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <div class="text-danger">
                        <h1>Attention!</h1>
                        <p>Vous êtes sur le point de supprimer le role <strong><?php echo e($role->name); ?></strong>. Cela engendrera la supression de tous les utilisateurs liés à cet role. Voulez-vous vraiment procéder à la suppression ?</p>
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
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              
          <?php endif; ?>
        </tbody>
      </table>
      <div class="modal fade" id="modal_add_role" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajout de role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?php echo e(route('roles.store')); ?>" method="post">
            <div class="modal-body">
              <?php echo csrf_field(); ?>
              <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Nom du role" required>
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/roles.blade.php ENDPATH**/ ?>