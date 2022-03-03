

<?php $__env->startSection('title'); ?>
    Inscription aux newsletters
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Breadcrumb::class, ['title' => 'Inscription aux newsletters','currentPage' => 'Newsletters']); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280)): ?>
<?php $component = $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280; ?>
<?php unset($__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <div class="container mt-2">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="form-section section-inner-padding-150">
        <div class="box-wrapper">
            <div class="section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="section-content section-content-gap-80 text-center">
                                <h3 class="section-title">S'inscrire au newsletters</h3>
                                <span class="icon-seperator"><img src="assets/images/icons/section-seperator-shape.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12">
                            <form id="contact-form" action="<?php echo e(route('news_letter')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 mb-20">
                                        <div class="default-form-single-item">
                                            <input name="name" type="text" class="border" placeholder="Nom complet"
                                                required>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="default-form-single-item">
                                            <input name="email" type="email" class="border"
                                                placeholder="Adresse email" required>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-default icon-right submit-btn">Envoyer<i
                                                class="icofont-double-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/pages/newsletter.blade.php ENDPATH**/ ?>