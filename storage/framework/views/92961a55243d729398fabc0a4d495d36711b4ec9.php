
<?php $__env->startSection('title'); ?>
    parténaires
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    Liste des parténaires
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    parténaires
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
          <h3 class="card-title">Liste des parténaires</h3>
          <div class="card-tools">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_role">Ajouter un parténaire</button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nom</th>
                <th>logo</th>
                <th>lien</th>
                <th>Edition</th>
                <th>Suppression</th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td><?php echo e($partner->id); ?>.</td>
                <td><?php echo e($partner->name); ?></td>
                <td>
                  <img src="<?php echo e(asset('storage/' . $partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" width="50">
                </td>
                <td><?php echo e($partner->link); ?></td>
                <td>
                  <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal_edit_<?php echo e($partner->id); ?>" style="width: fit-content;">
                    <i class="far fa-edit"></i>
                    Editer
                  </button>
                  <div class="modal fade" id="modal_edit_<?php echo e($partner->id); ?>" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Modification du parténaire</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <form action="<?php echo e(route('partners.update', $partner->id)); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('PUT'); ?>
                          <div class="form-group mb-3">
                              <input type="text" name="name" class="form-control" placeholder="Nom du parténaire" value="<?php echo e($partner->name); ?>" required>
                          </div>
                          <div class="form-group mb-3">
                              <label for="link">Lien du site du parénaire</label>
                              <input type="text" name="link" id="link" class="form-control" placeholder="Entrez le lien" value="<?php echo e($partner->link); ?>">
                          </div>
                          <div class="form-group">
                            <label for="profile">Logo du partner</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="logo"
                                        accept="image/jpeg, .image/jpg, image/png">
                                    <label class="custom-file-label" for="profile">Choisir une image</label>
                                </div>
                            </div>
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
                  <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_destroy_<?php echo e($partner->id); ?>" style="width: fit-content;">
                    <i class="fas fa-trash"></i>
                    Supprimer
                  </button>
    
                  <div class="modal fade" id="modal_destroy_<?php echo e($partner->id); ?>" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Suppression du parténaire</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <form action="<?php echo e(route('partners.destroy', $partner->id)); ?>" method="post">
                        <div class="modal-body">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <div class="text-danger">
                            <h1>Attention!</h1>
                            <p>Vous êtes sur le point de supprimer le parténaire <strong><?php echo e($partner->name); ?></strong>. Voulez-vous vraiment procéder à la suppression ?</p>
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
                  <tr>
                    <div class="alert alert-info">
                      Aucun parténaire pour le moment.
                    </div>
                  </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <div class="modal fade" id="modal_add_role" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ajout de parténaires</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="<?php echo e(route('partners.store')); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <?php echo csrf_field(); ?>
                  <div class="form-group mb-3">
                    <label for="name">Nom du parténaire: </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom du partner" required>
                </div>
                  <div class="form-group mb-3">
                      <label for="link">Lien du site du parténaire: </label>
                    <input type="text" name="link" id="link" class="form-control" placeholder="Entrez le lien">
                </div>
                <div class="form-group">
                    <label for="profile">Logo du parténaire: </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input" id="logo"
                                accept="image/jpeg, .image/jpg, image/png">
                            <label class="custom-file-label" for="profile" required>Choisir une image</label>
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
        </div>
        <!-- /.card-body -->
      </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_script'); ?>

<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<script>
  $(function() {
  bsCustomFileInput.init();
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/partner.blade.php ENDPATH**/ ?>