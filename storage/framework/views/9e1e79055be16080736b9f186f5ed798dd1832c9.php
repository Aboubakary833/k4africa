
<?php $__env->startSection('title'); ?>
    Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    Blog
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
              <h3 class="card-title">Liste des articles</h3>
              <div class="card-tools">
                <a href="<?php echo e(route('manage_blog.create')); ?>" class="btn btn-primary">Ajouter un article</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Commentaire</th>
                    <th>Date de publication</th>
                    <th>Edition</th>
                    <th>Suppression</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($article->title); ?></td>
                        <td><?php echo e(count($article->comments)); ?></td>
                        <td><?php echo e($article->created_at); ?></td> 
                        <td>
                            <a href="<?php echo e(route('manage_blog.edit', $article->id)); ?>" class="btn btn-info">Editer</a>    
                        </td> 
                        <td>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal_destroy_<?php echo e($article->id); ?>">Supprimer</button>    
                        </td> 
                        <div class="modal fade" id="modal_destroy_<?php echo e($article->id); ?>" aria-hidden="true"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Suppression d'article</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo e(route('manage_blog.destroy', $article->id)); ?>"
                                        method="post">
                                        <div class="modal-body">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <div class="text-danger">
                                                <h1>Attention!</h1>
                                                <p>Vous êtes sur le point de supprimer l'article
                                                    <strong><?php echo e($article->title); ?></strong>. Voulez-vous
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
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                     <tr>
                         <div class="alert alert-info">
                            Aucun article n'a encore été publié.
                         </div>
                    </tr> 
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/blog.blade.php ENDPATH**/ ?>