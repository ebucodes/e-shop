@section('title',"{$pageTitle}")
@extends('layouts.website.app')

@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>{{ $pageTitle }}</h2>
                        <span> <a href="{{ route('homePage') }}">Home</a> - {{ $pageTitle }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login -->
<section class="section-login padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-login" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="{{ asset('website/assets/img/logo/logo.png') }}" alt="logo">
                    </div>
                    <form action="{{ route('signIn') }}" method="POST" class="cr-content-form needs-validation"
                        novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="cr-form-control form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="cr-form-control form-control" required>
                        </div>
                        {{-- <div class="remember">
                            <span class="form-group custom">
                                <input type="checkbox" id="html">
                                <label for="html">Remember Me</label>
                            </span>
                            <a class="link" href="forgot.html">Forgot Password?</a>
                        </div> --}}
                        <br>
                        <div class="login-buttons">
                            <button type="submit" class="cr-button btn-success">Login</button>
                            <a href="{{ route('register') }}" class="link">
                                Create a new account
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection