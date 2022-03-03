
<?php $__env->startSection('title'); ?>
    Blog - <?php echo e($article->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    <?php echo e($article->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    <?php echo e($article->title); ?>

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
                    <form action="<?php echo e(route('manage_blog.update', $article->id)); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-2">
                            <label for="title">Titre de la sous page: </label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Entrez le title de l'article" value="<?php echo e($article->title); ?>" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="path">chemin de la sous page: </label>
                            <input type="text" name="path" class="form-control" id="path"
                                placeholder="Entrez le chemin de l'article" value="<?php echo e($article->slug->value); ?>"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="pathname">Nom du chemin: </label>
                            <input type="text" name="pathname" class="form-control" id="pathname"
                                placeholder="Entrez le nom du chemin de la sous page" value="<?php echo e($article->slug->name); ?>"
                                required>
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
                        Contenu de l'article
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?php echo e(route('updateArticleContent')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="article" value="<?php echo e($article->id); ?>" required>
                        <textarea id="summernote" name="content">
                  <?php echo e($article->content); ?>

                </textarea>
                        <button class="btn btn-primary" type="submit">Envoyer la modification</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Auteur</th>
              <th>Commentaire</th>
              <th>Date de publication</th>
              <th>Suppression</th>
            </tr>
          </thead>
          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                  <td><?php echo e($comment->user->name); ?></td>
                  <td><?php echo e($comment->content); ?></td>
                  <td><?php echo e($comment->created_at); ?></td>
                  <td>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#modal_destroy_<?php echo e($comment->id); ?>">Supprimer</button>    
                  </td> 
                  <div class="modal fade" id="modal_destroy_<?php echo e($comment->id); ?>" aria-hidden="true"
                      style="display: none;">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Suppression de commentaire</h4>
                                  <button type="button" class="close" data-dismiss="modal"
                                      aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <form action="<?php echo e(route('comments.destroy', $comment->id)); ?>"
                                  method="post">
                                  <div class="modal-body">
                                      <?php echo csrf_field(); ?>
                                      <?php echo method_field('DELETE'); ?>
                                      <div class="text-danger">
                                          <h1>Attention!</h1>
                                          <p>Vous êtes sur le point de supprimer le commentaire de
                                              <strong><?php echo e($comment->user->name); ?></strong>. Voulez-vous
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
                      Aucun commentaire pour cet article.
                   </div>
              </tr> 
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional_script'); ?>
    <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $(function() {
            $('#summernote').summernote()
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/article.blade.php ENDPATH**/ ?>