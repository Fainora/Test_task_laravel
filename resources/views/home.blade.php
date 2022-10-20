@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div>
                        <a href="{{ route('main.index') }}" class="btn btn-primary">Админка</a>

                        <a href="/api/categories" class="btn btn-success">API</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
