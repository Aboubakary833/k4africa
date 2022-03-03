
<?php $__env->startSection('title'); ?> À propos <?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <?php if (isset($component)) { $__componentOriginal40fe594eae3d7d27fa8bd9a508c1498f43cae280 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Breadcrumb::class, ['title' => 'À propos de Knowledge For Africa','currentPage' => 'à propos']); ?>
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

    <div class="content-display-section section-top-gap-150 mt-0">
        <div class="box-wrapper custom-box-wrapper about-box-wrapper pos-relative">
            <div class="content-inner-img content-inner-img-left">
                <?php if(!$active_page->image): ?>
                <img class="img-fluid" src="<?php echo e(asset('assets/images/section-image/section-image-1.png')); ?>" alt="default">
                <?php else: ?>
                <img class="img-fluid" src="<?php echo e(asset('storage/' . $active_page->image)); ?>" alt="default">
                <?php endif; ?>
            </div>
            <div class="section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pos-relative">
                            <div class="custom-section-content custom-section-content-about custom-section-content-right">
                                <div class="section-content section-content-gap-50 ">
                                    <h3 class="section-title"><?php echo e($additionalContents['title']['content']); ?></h3>
                                </div>
                                <p><?php echo e($additionalContents['text']['content']); ?></p>

                                <ul class="default-iconic-item-2">
                                    <li>
                                        <div class="icon"><i class="icofont-check"></i></div>
                                        <div class="content">
                                            <h4 class="smalltitle"><?php echo e($additionalContents['list_1_title']['content']); ?></h4>
                                            <p><?php echo e($additionalContents['list_1_text']['content']); ?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="icofont-check"></i></div>
                                        <div class="content">
                                            <h4 class="smalltitle"><?php echo e($additionalContents['list_2_title']['content']); ?></h4>
                                            <p><?php echo e($additionalContents['list_2_text']['content']); ?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="count-display section-fluid-200 section-top-gap-150 section-inner-padding-100 section-inner-bg mt-0">
        <div class="box-wrapper">
            <div class="count-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="counter-items counter-items-style-2 justify-content-center">
                                <li class="counter-single-item">
                                    <div class="count-box">
                                        <img src="assets/images/icons/count-shape-blue.png" alt="">
                                        <p class="text"><span class="counter"  data-to="100" data-speed="1500"><?php echo e($additionalContents['Clients heureux']['content']); ?></span>%</p>
                                    </div>
                                    <h6 class="title"><?php echo e($additionalContents['Clients heureux']['title']); ?></h6>
                                </li>
                                <!-- End Counter Single Items  -->
                                <!-- Start Counter Single Items  -->
                                <li class="counter-single-item">
                                    <div class="count-box">
                                        <img src="assets/images/icons/count-shape-orange.png" alt="">
                                        <p class="text"><span class="counter"><?php echo e($additionalContents['Note positive']['content']); ?></span>/100</p>
                                    </div>
                                    <h6 class="title"><?php echo e($additionalContents['Note positive']['title']); ?></h6>
                                </li>
                                <!-- End Counter Single Items  -->
                                <!-- Start Counter Single Items  -->
                                <li class="counter-single-item">
                                    <div class="count-box">
                                        <img src="assets/images/icons/count-shape-purple.png" alt="">
                                        <p class="text"><span class="counter"><?php echo e($additionalContents['Projets realisés']['content']); ?></span></p>
                                    </div>
                                    <h6 class="title"><?php echo e($additionalContents['Projets realisés']['title']); ?></h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($teamMembers): ?>
    <div class="team-display section-top-gap-150">
        <div class="box-wrapper">
            <div class="section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-3">
                            <div class="section-content section-content-gap-80 text-center">
                                <h6 class="section-tag tag-orange">Membres de l'équipe K4Africa</h6>
                                <h3 class="section-title">Rencontrez les membres de notre formidable et dévouée équipe</h3>
                                <span class="icon-seperator"><img src="assets/images/icons/section-seperator-shape.png" alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Start Team SLider -->
                            <div class="team-slider default-slider">
                                <!-- Slider main container -->
                                <div class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginala2d3949b3c8fba547e4d5027e486c1e82726093d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TeamMemberCard::class, ['data' => $member]); ?>
<?php $component->withName('team-member-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala2d3949b3c8fba547e4d5027e486c1e82726093d)): ?>
<?php $component = $__componentOriginala2d3949b3c8fba547e4d5027e486c1e82726093d; ?>
<?php unset($__componentOriginala2d3949b3c8fba547e4d5027e486c1e82726093d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <!-- Navigation buttons -->
                                <div class="default-slider-buttons">
                                    <div class="slider-button button-prev rounded-circle"><i class="icofont-long-arrow-left"></i></div>
                                    <div class="slider-button button-next rounded-circle"><i class="icofont-long-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="company-logo-display-section section-fluid-135 company-logo-border mt-4">
        <div class="box-wrapper">
            <div class="company-logo-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-3">
                            <div class="section-content section-content-gap-80 text-center">
                                
                                <h3 class="section-title mt-4">Nos partenaires</h3>
                                <span class="icon-seperator"><img
                                        src="assets/images/icons/section-seperator-shape.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Start Company Logo Slider -->
                            <div class="company-logo-slider">
                                <!-- Slider main container -->
                                <div class="swiper-container">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Partners -->

                                        <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginal5d6c8676f98fa1bf96b979a07473cc7ba8b89482 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PartnerLogo::class, ['data' => $partner]); ?>
<?php $component->withName('partner-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal5d6c8676f98fa1bf96b979a07473cc7ba8b89482)): ?>
<?php $component = $__componentOriginal5d6c8676f98fa1bf96b979a07473cc7ba8b89482; ?>
<?php unset($__componentOriginal5d6c8676f98fa1bf96b979a07473cc7ba8b89482); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                            <!-- End Company Logo Slider -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if($testimonials): ?>
        <div class="testimonial-display-section section-top-gap-150">
            <div class="box-wrapper">
                <div class="section-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2">
                                <div class="section-content section-content-gap-80 text-center">
                                    <h6 class="section-tag tag-blue">Témoingnages des clients</h6>
                                    <h3 class="section-title">Quelques témoignages de nos clients nous concernant</h3>
                                    <span class="icon-seperator"><img
											src="assets/images/icons/section-seperator-shape.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!-- Start Testimonial Slider - Content -->
                                <div class="testimonial-content-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginal78ad3fb58fed6850d629b74373c4565d01ad67ff = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Testimonial::class, ['data' => $testimonial]); ?>
<?php $component->withName('testimonial'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal78ad3fb58fed6850d629b74373c4565d01ad67ff)): ?>
<?php $component = $__componentOriginal78ad3fb58fed6850d629b74373c4565d01ad67ff; ?>
<?php unset($__componentOriginal78ad3fb58fed6850d629b74373c4565d01ad67ff); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Testimonial Slider - Content -->
                                <!-- Start Testimonial Slider - Thumbnail -->
                                <div class="testimonial-thumb-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginal353fdda7fc5b4e67f0f849484227819bc85d9a74 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TestimonialAuthor::class, ['data' => $testimonial['author']]); ?>
<?php $component->withName('testimonial-author'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal353fdda7fc5b4e67f0f849484227819bc85d9a74)): ?>
<?php $component = $__componentOriginal353fdda7fc5b4e67f0f849484227819bc85d9a74; ?>
<?php unset($__componentOriginal353fdda7fc5b4e67f0f849484227819bc85d9a74); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ENd Testimonial Slider - Thumbnail -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ...::: End Testimonial Display Section :::... -->
        </div>
        <!-- ...::: End Testimonial Display Section :::... -->
        <?php endif; ?>

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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/pages/about.blade.php ENDPATH**/ ?>