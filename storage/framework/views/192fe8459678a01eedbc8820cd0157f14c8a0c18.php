
<?php $__env->startSection('title'); ?>
    <?php echo e($page->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    Gestion de page | <?php echo e($page->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    page utilisateur <?php echo e($page->name); ?>

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
      <h3 class="card-title">Page - <?php echo e($page->name); ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_edit_page">
          Modifier
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row align-items-center">
          <div class="col-12 col-md-6"> 
            <h2><?php echo e($page->title ?? "Auncun titre disponible pour cette page!"); ?></h2>
          </div>
          <div class="col-12 col-md-6">
            <?php if(!$page->image): ?>
            <img src="<?php echo e(asset('assets/images/hero/hero.png')); ?>" alt="default" width="100%">
            <?php else: ?>
            <img src="<?php echo e(asset('storage/' . $page->image)); ?>" alt="default" width="100%">
            <?php endif; ?>
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
          <?php $__empty_1 = true; $__currentLoopData = $additional_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($content->id); ?>.</td>
            <td><?php echo e($content->name); ?></td>
            <td><?php echo e($content->content); ?></td>
            <td>
              <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal_edit_<?php echo e($content->id); ?>" style="width: fit-content;">
                <i class="far fa-edit"></i>
                Editer
              </button>
              <div class="modal fade" id="modal_edit_<?php echo e($content->id); ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Modification du contenu</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="<?php echo e(route('additional_content.update', $content->id)); ?>" method="post">
                    <div class="modal-body">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="form-group mb-3">
                        <label for="name">Nom du contenu</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Nom du role" value="<?php echo e($content->name); ?>" required>
                      </div>
                      <div class="form-group mb-3">
                        <label for="content">Modifier le contenu</label>
                          <input type="text" name="content" id="content" class="form-control" placeholder="Nom du role" value="<?php echo e($content->content); ?>" required>
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
            <?php if(!$page->name === "Accueil"): ?>
            <td>
              <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_destroy_<?php echo e($content->id); ?>" style="width: fit-content;">
                <i class="fas fa-trash"></i>
                Supprimer
              </button>

              <div class="modal fade" id="modal_destroy_<?php echo e($content->id); ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Suppression du contenu</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="<?php echo e(route('additional_content.destroy', $content->id)); ?>" method="post">
                    <div class="modal-body">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <div class="text-danger">
                        <h1>Attention!</h1>
                        <p>Vous êtes sur le point de supprimer le contenu <strong><?php echo e($content->name); ?></strong>. Cela engendrera la supression de ce contenu au niveau de la page <strong><?php echo e($page->name); ?></strong></p>
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
            <?php endif; ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <div class="alert alert-warning mx-auto">
                  Il n'y a aucun contenu additionnel disponible pour cette page!
                </div>
              </tr>
          <?php endif; ?>
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
            <form action="<?php echo e(route('additional_content.store')); ?>" method="post">
              <input type="hidden" name="page" value="<?php echo e($page->id); ?>" required>
            <div class="modal-body">
              <?php echo csrf_field(); ?>
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

  <?php if(!in_array($page->id, [1, 4, 5])): ?>
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
          <?php $__empty_1 = true; $__currentLoopData = $page->subpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td><?php echo e($subpage->id); ?></td>
                <td><?php echo e($subpage->name); ?></td>
                <td><?php echo e($subpage->title); ?></td>
                <td>
                  <a class="btn btn-info" href="<?php echo e(route('subpages.edit', $subpage->id)); ?>">
                    <i class="fas fa-edit"></i>
                    Editer
                  </a>
                </td>
                <td>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_subpage_<?php echo e($subpage->id); ?>">
                    <i class="fas fa-trash"></i>
                    Supprimer
                  </button>
                </td>
                <div class="modal fade" id="modal_delete_subpage_<?php echo e($subpage->id); ?>" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Suppression de la sous page</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form action="<?php echo e(route('subpages.destroy', $subpage->id)); ?>" method="post">
                      <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="text-danger">
                          <h1>Attention!</h1>
                          <p>Vous êtes sur le point de supprimer la sous page <strong><?php echo e($subpage->title); ?></strong>. Cela engendrera la supression de cette sous section au niveau de la page <strong><?php echo e($page->name); ?></strong></p>
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
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- /Subpages -->
  <?php endif; ?>

  <div class="modal fade" id="modal_edit_page" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifer le titre et/ou l'image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo e(route('page.update', $page->id)); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <?php echo csrf_field(); ?>
          <div class="form-group mb-1">
            <textarea name="title" id="title" cols="30" rows="4" class="form-control" placeholder="Titre de la page" required><?php echo e($page->title); ?></textarea>
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
  <?php if(!in_array($page->id, [1, 4, 5])): ?>
  <div class="modal fade" id="add_subpage" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajout d'une sous page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo e(route('subpages.store')); ?>" method="post">
        <div class="modal-body">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="page" value="<?php echo e($page->id); ?>" required>
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
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_script'); ?>

<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<script>
  $(function() {
  bsCustomFileInput.init();
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/page.blade.php ENDPATH**/ ?>