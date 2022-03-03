<?php $__env->startSection('title'); ?> Accueil <?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>
        <!-- ...::: Start Hero Display Section :::... -->
        <div class="hero-display-section section-fluid-200">
            <div class="box-wrapper">
                <div class="hero-wrapper">
                    <div class="hero-content">
                        <h2 class="title"><?php echo ($active_page->title); ?> </h2>
                        <?php if(isset($additionalContents[0])): ?>
                        <p><?php echo e($additionalContents[0]->content); ?></p>
                        <?php endif; ?>
                        <a href="<?php echo e(route('services')); ?>" class="btn btn-lg btn-default icon-right">Tous nos services <i class="icofont-double-right"></i></a>
                    </div>
                    <div class="hero-image">
                        <?php if(!$active_page->image): ?>
                        <img class="img-fluid" src="<?php echo e(asset('assets/images/hero/hero.png')); ?>" alt="default">
                        <?php else: ?>
                        <img class="img-fluid" src="<?php echo e(asset('storage/' . $active_page->image)); ?>" alt="default">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...::: End Hero Display Section :::... -->

        <!-- ...::: Start Count Display Section :::... -->
        <?php if(isset($additionalContents[1]) || isset($additionalContents[2]) || isset($additionalContents[3]) || $additionalContents[4]): ?>
        <div class="count-display section-fluid-200 section-top-gap-150 section-inner-padding-100 section-inner-gray-gradient-bg-reverse">
            <div class="box-wrapper">
                <div class="count-wrapper pos-relative">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-contents-between">
                            <?php if(isset($additionalContents[1])): ?>
                            <div class="col-xl-5 offset-xl-0 col-md-10 offset-md-1 col-sm-12">
                                <div class="content text-lg-start text-center">
                                    <h3 class="title"><?php echo($additionalContents[1]->content); ?></h3>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col">
                                <ul class="counter-items counter-items-style-1">
                                    <!-- Start Counter Single Items  -->
                                    <?php if(isset($additionalContents[2])): ?>
                                    <li class="counter-single-item">
                                        <div class="count-box">
                                            <img src="assets/images/icons/count-shape-blue.png" alt="">
                                            <p class="text"><span class="counter"  data-to="100" data-speed="1500"><?php echo e($additionalContents[2]->content); ?></span>%</p>
                                        </div>
                                        <h6 class="title"><?php echo e($additionalContents[2]->name); ?></h6>
                                    </li>
                                    <?php endif; ?>
                                    <!-- End Counter Single Items  -->
                                    <!-- Start Counter Single Items  -->
                                    <?php if(isset($additionalContents[3])): ?>
                                    <li class="counter-single-item">
                                        <div class="count-box">
                                            <img src="assets/images/icons/count-shape-orange.png" alt="">
                                            <p class="text"><span class="counter"><?php echo e($additionalContents[3]->content); ?></span>/100</p>
                                        </div>
                                        <h6 class="title"><?php echo e($additionalContents[3]->name); ?></h6>
                                    </li>
                                    <?php endif; ?>
                                    <!-- End Counter Single Items  -->
                                    <!-- Start Counter Single Items  -->
                                    <?php if(isset($additionalContents[4])): ?>
                                    <li class="counter-single-item">
                                        <div class="count-box">
                                            <img src="assets/images/icons/count-shape-purple.png" alt="">
                                            <p class="text"><span class="counter"><?php echo e($additionalContents[4]->content); ?></span>%</p>
                                        </div>
                                        <h6 class="title"><?php echo e($additionalContents[4]->name); ?></h6>
                                    </li>
                                    <?php endif; ?>
                                    <!-- End Counter Single Items  -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dotline-animate">
                        <span class="blue"></span>
                        <span class="orange"></span>
                        <span class="blue"></span>
                    </div>
                </div>
            </div>

        </div>
        <?php endif; ?>
        <!-- ...::: End Count Display Section :::... -->

        <!-- ...::: Start Promo Display Section :::... -->
        <div class="promo-display-section section-inner-padding-150 section-inner-bg-theme-color-gradeint-noise">
            <div class="box-wrapper">
                <div class="promo-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!-- Start Promo Items -->
                                <div class="promo-items">
                                    <?php $__currentLoopData = $promosData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (isset($component)) { $__componentOriginal7ea89452509850d8474f335db781860b1e6c6d9d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PromoCard::class, ['data' => json_encode($data)]); ?>
<?php $component->withName('promo-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7ea89452509850d8474f335db781860b1e6c6d9d)): ?>
<?php $component = $__componentOriginal7ea89452509850d8474f335db781860b1e6c6d9d; ?>
<?php unset($__componentOriginal7ea89452509850d8474f335db781860b1e6c6d9d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <!-- End Promo Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...::: End Promo Display Section :::... -->

        <!-- ...::: Start Service Display Section :::... -->
        <div class="service-dispaly-section section-inner-padding-150 service-dispaly-bg">
            <div class="box-wrapper">
                <div class="section-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 offset-xl-3">
                                <div class="section-content section-content-gap-80 text-center">
                                    <h6 class="section-tag tag-orange">Nos services</h6>
                                    <h3 class="section-title">Fournir un service exceptionnel à nos clients</h3>
                                    <span class="icon-seperator"><img
											src="assets/images/icons/section-seperator-shape.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!-- Start Service Slider -->
                                <div class="service-slider default-slider">
                                    <!-- Slider main container -->
                                    <div class="swiper-container">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
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
        <!-- ...::: End Service Display Section :::... -->

        <!-- ...::: Start Content Display Section :::... -->
        <div class="content-display-section section-top-gap-150 mb-4">
            <div class="box-wrapper custom-box-wrapper pos-relative">
                <div class="content-inner-img content-inner-img-left">
                    <img class="img-fluid" src="assets/images/section-image/section-image-1.png" alt="">
                </div>
                <div class="section-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 pos-relative">
                                <div class="custom-section-content custom-section-content-right">
                                    <div class="section-content section-content-gap-50">
                                        <h6 class="section-tag tag-blue">Pourquoi nous choisir</h6>
                                        <h3 class="section-title"> Boostez vos compétences et votre business avec Knowlegdge For Africa</h3>
                                    </div>
                                    <p>Nous offrons les meilleures services pour vous accompagner dans la transformation digitale de vos entreprises et dans la formation. </p>

                                    <ul class="content-lists">
                                        <li><i class="icofont-check"></i>Sécurité et confidentialité</li>
                                        <li><i class="icofont-check"></i>Solutions adéquates</li>
                                        <li><i class="icofont-check"></i>Hautement qualifié</li>
                                        <li><i class="icofont-check"></i>Assistance</li>
                                    </ul>

                                    <a href="contact.html" class="btn btn-lg btn-default icon-right">Démarrer<i
											class="icofont-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...::: End Content Display Section :::... -->

        <!-- ...::: Start Project Display Section :::... -->


        <!-- ...::: Start Company Logo Display Section :::... -->
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
        <!-- ...::: End Company Logo Display Section :::... -->

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

        <!-- ...::: Start Blog Feed Section :::... -->
        <?php if($articles): ?>
        <div class="blog-feed-display-section section-inner-padding-150 section-top-gap-150 blog-feed-dispaly-bg">
            <div class="box-wrapper">
                <div class="section-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="section-content section-content-gap-80">
                                    <h6 class="section-tag tag-blue">Derniers articles</h6>
                                    <h3 class="section-title">Découvrez les derniers articles de notre blog sur des sujets qui pourraient vous intéresser.</h3>
                                    <span class="icon-seperator"><img
											src="assets/images/icons/section-seperator-shape.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blgo-feed-slider">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 pos-relative">
                                <!-- Start Blog Feed Slider -->
                                <div class="blog-feed-slider blog-feed-slider-style-1 default-slider">
                                    <!-- Slider main container -->
                                    <div class="swiper-container">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginalb290b2abbf2e7c6d540134c9b3e1571aa9ae3d55 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ArticleCard::class, ['data' => $article]); ?>
<?php $component->withName('article-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb290b2abbf2e7c6d540134c9b3e1571aa9ae3d55)): ?>
<?php $component = $__componentOriginalb290b2abbf2e7c6d540134c9b3e1571aa9ae3d55; ?>
<?php unset($__componentOriginalb290b2abbf2e7c6d540134c9b3e1571aa9ae3d55); ?>
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
                                <!-- End Blog Feed Slider -->
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yaya\Desktop\k4arefonte\resources\views/pages/home.blade.php ENDPATH**/ ?>