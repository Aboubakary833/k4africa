@extends('layouts.main')

@section('title')
    Demander un dévis
@endsection

@section('main')
    <x-breadcrumb title="Demande de dévis" currentPage="Demander un dévis" />
    <div class="container mt-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
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
                                <h3 class="section-title">Nous demander un dévis</h3>
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
                            <form id="contact-form" action="{{ route('askdevis') }}" method="post">
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
                                            <input name="type" type="text" list="types" class="border" placeholder="Sujet"
                                                required>
                                            <datalist id="types">
                                                <option value="Réalisation de site web">Réalisation de site web</option>
                                                <option value="Réalisation d'application web">Réalisation d'application web
                                                </option>
                                                <option value="Réalisation d'application mobile">Réalisation d'application
                                                    mobile</option>
                                                <option value="Réalisation d'application mobile">Réalisation d'application pour desktop(Ordinateurs)</option>
                                            </datalist>
                                            @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="default-form-single-item">
                                            <textarea name="message" class="border"
                                                placeholder="Expliquez nous en plus sur votre projet ..." rows="10"
                                                required></textarea>
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
@endsection
