@extends('layouts.main')

@section('title') Accueil @endsection

@section('main')

        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>
        <!-- ...::: Start Hero Display Section :::... -->
        <div class="hero-display-section section-fluid-200">
            <div class="box-wrapper">
                <div class="hero-wrapper">
                    <div class="hero-content">
                        <h2 class="title"><?php echo ($active_page->title); ?> </h2>
                        @if(isset($additionalContents[0]))
                        <p>{{ $additionalContents[0]->content }}</p>
                        @endif
                        <a href="{{ route('services') }}" class="btn btn-lg btn-default icon-right">Tous nos services <i class="icofont-double-right"></i></a>
                    </div>
                    <div class="hero-image">
                        @if (!$active_page->image)
                        <img class="img-fluid" src="{{ asset('assets/images/hero/hero.png') }}" alt="default">
                        @else
                        <img class="img-fluid" src="{{ asset('storage/' . $active_page->image) }}" alt="default">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- ...::: End Hero Display Section :::... -->

        <!-- ...::: Start Count Display Section :::... -->
        @if (isset($additionalContents[1]) || isset($additionalContents[2]) || isset($additionalContents[3]) || $additionalContents[4])
        <div class="count-display section-fluid-200 section-top-gap-150 section-inner-padding-100 section-inner-gray-gradient-bg-reverse">
            <div class="box-wrapper">
                <div class="count-wrapper pos-relative">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-contents-between">
                            @if (isset($additionalContents[1]))
                            <div class="col-xl-5 offset-xl-0 col-md-10 offset-md-1 col-sm-12">
                                <div class="content text-lg-start text-center">
                                    <h3 class="title"><?php echo($additionalContents[1]->content); ?></h3>
                                </div>
                            </div>
                            @endif
                            <div class="col">
                                <ul class="counter-items counter-items-style-1">
                                    <!-- Start Counter Single Items  -->
                                    @if (isset($additionalContents[2]))
                                    <li class="counter-single-item">
                                        <div class="count-box">
                                            <img src="assets/images/icons/count-shape-blue.png" alt="">
                                            <p class="text"><span class="counter"  data-to="100" data-speed="1500">{{ $additionalContents[2]->content }}</span>%</p>
                                        </div>
                                        <h6 class="title">{{ $additionalContents[2]->name }}</h6>
                                    </li>
                                    @endif
                                    <!-- End Counter Single Items  -->
                                    <!-- Start Counter Single Items  -->
                                    @if (isset($additionalContents[3]))
                                    <li class="counter-single-item">
                                        <div class="count-box">
                                            <img src="assets/images/icons/count-shape-orange.png" alt="">
                                            <p class="text"><span class="counter">{{ $additionalContents[3]->content }}</span>/100</p>
                                        </div>
                                        <h6 class="title">{{ $additionalContents[3]->name }}</h6>
                                    </li>
                                    @endif
                                    <!-- End Counter Single Items  -->
                                    <!-- Start Counter Single Items  -->
                                    @if (isset($additionalContents[4]))
                                    <li class="counter-single-item">
                                        <div class="count-box">
                                            <img src="assets/images/icons/count-shape-purple.png" alt="">
                                            <p class="text"><span class="counter">{{ $additionalContents[4]->content }}</span>%</p>
                                        </div>
                                        <h6 class="title">{{ $additionalContents[4]->name }}</h6>
                                    </li>
                                    @endif
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
        @endif
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
                                    @foreach ($promosData as $data)
                                        <x-promo-card :data="json_encode($data)" />
                                    @endforeach
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
                                            @foreach ($services as $data)
                                                <x-service-card :data="$data" />
                                            @endforeach
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

                                            @foreach ($partners as $partner)
                                                <x-partner-logo :data="$partner" />
                                            @endforeach

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

        @if ($testimonials)
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
                                            @foreach ($testimonials as $testimonial)
                                                <x-testimonial :data="$testimonial" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Testimonial Slider - Content -->
                                <!-- Start Testimonial Slider - Thumbnail -->
                                <div class="testimonial-thumb-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($testimonials as $testimonial)
                                                <x-testimonial-author :data="$testimonial['author']" />
                                            @endforeach
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
        @endif

        <!-- ...::: Start Blog Feed Section :::... -->
        @if ($articles)
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
                                            @foreach ($articles as $article)
                                                <x-article-card :data="$article" />
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Navigation buttons -->
                                    <div class="default-slider-buttons">
                                        <div class="slider-button button-prev rounded-circle"><i class="icofont-long-arrow-left"></i></div>
                                        <div class="slider-button button-next rounded-circle"><i class="icofont-long-arrow-right"></i></div>
                                    </div>
                                </div>
                                <!-- End Blog Feed Slider -->
                                @endif
                                <x-subscribe />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

@endsection