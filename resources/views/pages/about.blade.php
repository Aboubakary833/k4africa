@extends('layouts.main')
@section('title') À propos @endsection
@section('main')
    <x-breadcrumb title="À propos de Knowledge For Africa" currentPage="à propos" />

    <div class="content-display-section section-top-gap-150 mt-0">
        <div class="box-wrapper custom-box-wrapper about-box-wrapper pos-relative">
            <div class="content-inner-img content-inner-img-left">
                @if (!$active_page->image)
                <img class="img-fluid" src="{{ asset('assets/images/section-image/section-image-1.png') }}" alt="default">
                @else
                <img class="img-fluid" src="{{ asset('storage/' . $active_page->image) }}" alt="default">
                @endif
            </div>
            <div class="section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pos-relative">
                            <div class="custom-section-content custom-section-content-about custom-section-content-right">
                                <div class="section-content section-content-gap-50 ">
                                    <h3 class="section-title">{{$additionalContents['title']['content']}}</h3>
                                </div>
                                <p>{{$additionalContents['text']['content']}}</p>

                                <ul class="default-iconic-item-2">
                                    <li>
                                        <div class="icon"><i class="icofont-check"></i></div>
                                        <div class="content">
                                            <h4 class="smalltitle">{{$additionalContents['list_1_title']['content']}}</h4>
                                            <p>{{$additionalContents['list_1_text']['content']}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="icofont-check"></i></div>
                                        <div class="content">
                                            <h4 class="smalltitle">{{$additionalContents['list_2_title']['content']}}</h4>
                                            <p>{{$additionalContents['list_2_text']['content']}}</p>
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
                                        <p class="text"><span class="counter"  data-to="100" data-speed="1500">{{$additionalContents['Clients heureux']['content']}}</span>%</p>
                                    </div>
                                    <h6 class="title">{{$additionalContents['Clients heureux']['title']}}</h6>
                                </li>
                                <!-- End Counter Single Items  -->
                                <!-- Start Counter Single Items  -->
                                <li class="counter-single-item">
                                    <div class="count-box">
                                        <img src="assets/images/icons/count-shape-orange.png" alt="">
                                        <p class="text"><span class="counter">{{$additionalContents['Note positive']['content']}}</span>/100</p>
                                    </div>
                                    <h6 class="title">{{$additionalContents['Note positive']['title']}}</h6>
                                </li>
                                <!-- End Counter Single Items  -->
                                <!-- Start Counter Single Items  -->
                                <li class="counter-single-item">
                                    <div class="count-box">
                                        <img src="assets/images/icons/count-shape-purple.png" alt="">
                                        <p class="text"><span class="counter">{{$additionalContents['Projets realisés']['content']}}</span></p>
                                    </div>
                                    <h6 class="title">{{$additionalContents['Projets realisés']['title']}}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($teamMembers)
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
                                        @foreach ($teamMembers as $member)
                                            <x-team-member-card :data="$member" />
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
    @endif

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

        <x-subscribe />

@endsection