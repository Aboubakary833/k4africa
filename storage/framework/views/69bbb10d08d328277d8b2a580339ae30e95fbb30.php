
<?php $__env->startSection('title'); ?>
    <?php echo e($subpage->page->name . '-' . $subpage->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    <?php echo e($subpage->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    <?php echo e($subpage->name); ?>

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

<div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Modifier les éléments principaux
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="<?php echo e(route('subpages.update', $subpage->id)); ?>" method="post">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group mb-2">
              <label for="name">Nom de la sous page: </label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Entrez le nom de la sous page" value="<?php echo e($subpage->name); ?>" required>
            </div>
            <div class="form-group mb-2">
              <label for="title">Titre de la sous page: </label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Entrez le title de la sous page" value="<?php echo e($subpage->title); ?>" required>
            </div>
            <div class="form-group mb-2">
              <label for="path">chemin de la sous page: </label>
              <input type="text" name="path" class="form-control" id="path" placeholder="Entrez le chemin de la sous page" value="<?php echo e($subpage->slug->value); ?>" required>
            </div>
            <div class="form-group mb-2">
              <label for="pathname">Nom du chemin: </label>
              <input type="text" name="pathname" class="form-control" id="pathname" placeholder="Entrez le nom du chemin de la sous page" value="<?php echo e($subpage->slug->name); ?>" required>
            </div>
            <button class="btn btn-primary" type="submit">Envoyer la modification</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Contenu de la sous page
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="<?php echo e(route('subpages.updateContent')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="subpage" value="<?php echo e($subpage->id); ?>" required>
            <textarea id="summernote" name="content">
              <?php echo e($subpage->content); ?>

            </textarea>
            <button class="btn btn-primary" type="submit">Envoyer la modification</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional_script'); ?>
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script>
    $(function () {
      $('#summernote').summernote()
    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/subpage.blade.php ENDPATH**/ ?>