<style>
    a[data-path^="<?php echo e(Request::path()); ?>"] {
        color: var(--bs-blue) !important;
    }

</style>
<header class="header-section sticky-header d-none d-lg-block section-fluid-200">
    <div class="header-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <!-- Start Header Logo -->
                    <a href="<?php echo e(route('home')); ?>" class="header-logo">
                        <img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="" width="50">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-auto d-flex align-items-center">
                    <!-- Start Header Menu -->
                    <ul class="header-nav">
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page->id !== 6): ?>
                                <li class="has-dropdown">
                                    <a href="<?php echo e(route($page->slug->name)); ?>"
                                        data-path="<?php echo e($page->slug->value); ?>"><?php echo e($page->name); ?></a>
                                    <?php if(count($page->subpages) > 1): ?>
                                        <ul class="submenu">
                                            <?php $__currentLoopData = $page->subpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a
                                                        href="<?php echo e(route('details.subpage', $subpage->slug->value)); ?>"><?php echo e($subpage->name); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <!-- End Header Menu -->
                </div>
                <div class="col-auto">
                    <div class="header-btn-link">
                        <a href="<?php echo e(route('devis')); ?>" class="btn btn-lg btn-default" data-path="blog">Obtenir un
                            devis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- .....:::::: End Header Section :::::.... -->


<!-- .....:::::: Start Mobile Header Section :::::.... -->
<div class="mobile-header d-block d-lg-none">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <div class="mobile-logo">
                    <a href="index.html"><img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="K4Africa"
                            width="40"></a>
                </div>
            </div>
            <div class="col-auto">
                <div class="mobile-action-link text-end">
                    <a data-bs-toggle="offcanvas" href="#toggleMenu" role="button"><i
                            class="icofont-navigation-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .....:::::: Start MobileHeader Section :::::.... -->

<!--  .....::::: Start Offcanvas Mobile Menu Section :::::.... -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="toggleMenu">
    <div class="offcanvas-header">
        <!-- Start Header Logo -->
        <!-- End Header Logo -->
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page->id !== 6): ?>
                                <li>
                                    <a href="<?php echo e(route($page->slug->name)); ?>"
                                        data-path="<?php echo e($page->slug->value); ?>"><?php echo e($page->name); ?></a>
                                    <?php if(count($page->subpages) > 1): ?>
                                        <ul class="mobile-sub-menu">
                                            <?php $__currentLoopData = $page->subpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a
                                                        href="<?php echo e(route('details.subpage', $subpage->slug->value)); ?>"><?php echo e($subpage->name); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
                <div class="col-auto">
                    <div class="header-btn-link">
                        <a href="<?php echo e(route('devis')); ?>" class="btn btn-lg btn-default">Obtenir un devis</a>
                    </div>
                </div>
            </div> <!-- End Mobile Menu -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>
</div>
<!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
<?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/components/header.blade.php ENDPATH**/ ?>