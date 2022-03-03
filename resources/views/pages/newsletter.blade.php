@extends('layouts.main')

@section('title')
    Inscription aux newsletters
@endsection

@section('main')
    <x-breadcrumb title="Inscription aux newsletters" currentPage="Newsletters" />
    <div class="container mt-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif
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
                            <form id="contact-form" action="{{ route('news_letter') }}" method="post">
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
@endsection
