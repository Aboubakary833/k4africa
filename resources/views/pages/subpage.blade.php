@extends('layouts.main')

@section('title') Services | {{$subpage->name}} @endsection

@section('main')

    <div class="container text-center">
        <x-breadcrumb title="{{ $subpage->name }}" currentPage="{{ $subpage->name }}" />
        <?php echo($subpage->content); ?>
    </div>

@endsection