@extends('layouts.app')

@section('content')
<div class="container-fluid" style="min-height: 100vh; background-color: #1c1f2b;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white" style="border: none; border-radius: 12px;">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #2c2f38; border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                    <h3 class="mb-0" style="color: #ffffff;">{{ __('Dashboard') }}</h3>
                </div>

                <div class="card-body" style="background-color: #2c2f38;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-start">
                        <h4 class="mt-3">You are logged in!</h4>
                        <p class="text-muted">Explore your dashboard and manage your settings.</p>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    body {
        background-color: #1c1f2b;
    }

    .card {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        border-radius: 15px;
        padding: 20px;
        margin-top: 40px;
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
    }

    .lead {
        color: #adb5bd;
    }

    .btn-primary {
        background-color: #28a745;
        color: white;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border-radius: 8px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .navbar {
        background-color: #343a40;
    }

    .navbar .nav-item a {
        color: #ffffff;
    }

    .navbar .dropdown-menu {
        background-color: #343a40;
    }

    .navbar .dropdown-menu a {
        color: #ffffff;
    }
</style>
@endsection
