@extends('layouts.master')

@section('content')
    <section class="jumbotron text-center w-100">
        <div class="container">
            <img src="{{URL('/images/laravel_logo.png')}}" class="img-fluid" alt="Logo do Laravel">
            <h1 class="display-4">Bem-vindo ao Laravel</h1>
            <p class="lead">Um framework PHP poderoso e elegante para criar aplicações web.</p>
        </div>
    </section>
@endsection
