

<?php $__env->startSection('title'); ?> Services <?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Breadcrumb::class, ['title' => 'Tous les services','currentPage' => 'Services']); ?>
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

    <!-- ...::: Start Service Display Section :::... -->
    <div class="service-dispaly-section section-top-gap-150">
        <div class="box-wrapper">
            <div class="service-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Start Service Items -->
                            <div class="service-items">
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal742456e699f99e5fa48db1ed42ed0a617c2d4cbd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ServiceCard::class, ['data' => $data]); ?>
<?php $component->withName('service-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal742456e699f99e5fa48db1ed42ed0a617c2d4cbd)): ?>
<?php $component = $__componentOriginal742456e699f99e5fa48db1ed42ed0a617c2d4cbd; ?>
<?php unset($__componentOriginal742456e699f99e5fa48db1ed42ed0a617c2d4cbd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginal7fe8e348272e176d9323e07c8c88d6bc57d1ff22 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subscribe::class, []); ?>
<?php $component->withName('subscribe'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7fe8e348272e176d9323e07c8c88d6bc57d1ff22)): ?>
<?php $component = $__componentOriginal7fe8e348272e176d9323e07c8c88d6bc57d1ff22; ?>
<?php unset($__componentOriginal7fe8e348272e176d9323e07c8c88d6bc57d1ff22); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/pages/services.blade.php ENDPATH**/ ?>