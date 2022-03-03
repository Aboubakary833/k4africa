@extends('layouts.main')

@section('title') Programmes @endsection

@section('main')
    <x-breadcrumb title="Tous les programmes" currentPage="Programme" />

    <!-- ...::: Start Service Display Section :::... -->
    <div class="service-dispaly-section section-top-gap-150">
        <div class="box-wrapper">
            <div class="service-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Start Service Items -->
                            <div class="service-items">
                                @foreach ($programs as $data)
                                    <x-service-card :data="$data" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-subscribe />
@endsection
