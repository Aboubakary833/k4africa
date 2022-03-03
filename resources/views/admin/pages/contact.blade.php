@extends('admin.layouts.main')
@section('title')
    Message
@endsection
@section('bigTitle')
    Message
@endsection
@section('pageName')
    Message envoyé
@endsection

@section('main')

    <div class="container">
        <div class="card mx-auto">
            <div class="card-header">
                <h3 class="card-title"><i>Envoyer par : </i> {{ $contact->name }}</h3><br>
                <p>
                    <span>{{ $contact->email }}</span><br>
                    <span>{{ $contact->phone }}</span><br>
                    <span>Date: {{$contact->created_at}}</span>
                </p>
            </div>

            <div class="card-body">
                <h1>{{ $contact->subject }}</h1>

                <p>{{ $contact->message }}</p>
            </div>
        </div>
    </div>

@endsection