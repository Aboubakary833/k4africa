@extends('layouts.main')
@section('title')
    Contacts
@endsection

@section('main')
    <div class="contact-info-section section-inner-padding-150 section-inner-bg">
        <div class="box-wrapper">

            <div class="container">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ $message }}
                    </div>
                @endif
            </div>

            <!-- Start Contact Box Info Wrapper -->
            <div class="contact-box-info-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-12">
                            <ul class="contact-box-info-items">
                                <!-- Start Contact Box Info Single Item -->
                                <li class="contact-box-info-single-item">
                                    <h4 class="title">Nous joindre:</h4>
                                    <div class="contact-box-info-text">
                                        <a class="contact-box-info-text-single" href="tel:+0123456789"><span
                                                class="icon"><i class="icofont-phone"></i></span>
                                            <p>+226 65656499</p>
                                        </a>
                                        <a class="contact-box-info-text-single"
                                            href="mailto:info@knowledgeforafrica.com"><span class="icon"><i
                                                    class="icofont-envelope-open"></i></span>
                                            <p>info@knowledgeforafrica.com</p>
                                        </a>
                                        <address class="contact-box-info-text-single"><span class="icon"><i
                                                    class="icofont-location-pin"></i></span>
                                            <p></p>
                                        </address>
                                    </div>
                                </li>
                                <!-- End Contact Box Info Single Item -->
                                <!-- Start Contact Box Info Single Item -->
                                <li class="contact-box-info-single-item">
                                    <h4 class="title">Nous suivre</h4>
                                    <div class="contact-box-info-text">
                                        <a class="contact-box-info-text-single" href="tel:+0123456789"><span
                                                class="icon"><i class="icofont-phone"></i></span>
                                            <p>+(012) 345 6789</p>
                                        </a>
                                        <a class="contact-box-info-text-single" href="mailto:demo@example.com"><span
                                                class="icon"><i class="icofont-envelope-open"></i></span>
                                            <p>demo@example.com</p>
                                        </a>
                                        <address class="contact-box-info-text-single"><span class="icon"><i
                                                    class="icofont-location-pin"></i></span>
                                            <p>Your address goes here.</p>
                                        </address>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Box Info Wrapper -->
        </div>
    </div>

    <div class="form-section section-inner-padding-150">
        <div class="box-wrapper">
            <div class="section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="section-content section-content-gap-80 text-center">
                                <h6 class="section-tag tag-orange">Contacts</h6>
                                <h3 class="section-title">Nous contacter</h3>
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
                            <form id="contact-form" action="{{ route('contact.send') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-20">
                                        <div class="default-form-single-item">
                                            <input name="name" type="text" class="border" placeholder="Nom complet"
                                                required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="default-form-single-item">
                                            <input name="email" type="email" class="border"
                                                placeholder="Adresse email" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="default-form-single-item">
                                            <input name="phone" type="tel" class="border"
                                                placeholder="Numéro de téléphone" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="default-form-single-item">
                                            <input name="subject" type="text" class="border" placeholder="Sujet"
                                                required>
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="default-form-single-item">
                                            <textarea name="message" class="border" placeholder="Votre message ..."
                                                rows="10" required></textarea>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-lg btn-default icon-right submit-btn">Envoyer<i
                                                class="icofont-double-right"></i></button>
                                    </div>
                                    <p class="form-messege"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::: End Form Section :::... -->

    <!-- ...::: Start Map Section :::... -->
    <div class="map-section">
        <div class="box-wrapper">
            <div class="map-wrapper">
                <!-- Start Map Area-->
                <div class="gmap-box">
                    <iframe id="gmap_canvas"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15589.57695567562!2d-1.5298609066820226!3d12.35650342165515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2e95382f181e2f%3A0xababfd052b2e8181!2sKnowledge%20For%20Africa!5e0!3m2!1sfr!2sbf!4v1646068587283!5m2!1sfr!2sbf"></iframe>
                </div>
                <!-- End Map Area -->
            </div>
        </div>
    </div>
    <!-- ...::: End Map Section :::... -->
@endsection
