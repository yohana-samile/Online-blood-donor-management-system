@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Enjoy by using left Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }} {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
            <h4 class="card-title">Primary card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        </div>
    </div>
@endsection
