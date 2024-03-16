@section('title','Register')
@extends('layouts.website.app')

@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Register</h2>
                        <span> <a href="index.html">Home</a> - Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Register -->
<section class="section-register padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Register</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-register" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="{{ asset('website/assets/img/logo/logo.png') }}" alt="logo">
                    </div>
                    <form method="POST" action="{{ route('createUser') }}" class="cr-content-form needs-validation"
                        novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="firstName" placeholder="Enter Your First Name"
                                        class="cr-form-control form-control" value="{{ old('firstName') }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lastName" placeholder="Enter Your Last Name"
                                        class="cr-form-control form-control" value="{{ old('lastName') }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter Your email" class="cr-form-control form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        placeholder="Enter Your phone number" class="cr-form-control form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" placeholder="Password"
                                        class="cr-form-control form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Type of Account <span class="text-danger">*</span></label>
                                    <select name="role" class="cr-form-control form-control" required>
                                        <option value="">-- Select --</option>
                                        <option value="buyer">Buyer</option>
                                        <option value="seller">Seller</option>
                                    </select>
                                </div>
                            </div>
                            <div class="cr-register-buttons">
                                <button type="submit" class="cr-button btn-success">Create Account</button>
                                <a href="{{ route('login') }}" class="link">
                                    Have an account?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection