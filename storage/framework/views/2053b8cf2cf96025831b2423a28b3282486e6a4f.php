
<?php $__env->startSection('title'); ?>
    Message
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bigTitle'); ?>
    Message
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    Message envoyé
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="container">
        <div class="card mx-auto">
            <div class="card-header">
                <h3 class="card-title"><i>Envoyer par : </i> <?php echo e($contact->name); ?></h3><br>
                <p>
                    <span><?php echo e($contact->email); ?></span><br>
                    <span><?php echo e($contact->phone); ?></span><br>
                    <span>Date: <?php echo e($contact->created_at); ?></span>
                </p>
            </div>

            <div class="card-body">
                <h1><?php echo e($contact->subject); ?></h1>

                <p><?php echo e($contact->message); ?></p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/admin/pages/contact.blade.php ENDPATH**/ ?>