@section('title',$pageTitle)

@extends('layouts.account.app')

@section('content')
<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5>{{ $pageTitle }}</h5>
                <ul>
                    <li><a href="#">Carrot</a></li>
                    <li>{{ $pageTitle }}</li>
                </ul>
            </div>
        </div>
        <form class="cr-profile-add needs-validation" action="{{ route('sellerSaveProfile') }}" method="POST"
            onsubmit="showConfirmation(this, event, 'submit');" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <input type="text" name="companyName" class="form-control"
                                    value="{{ $profile->companyName ?? NULL }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Registration Number</label>
                                <input type="text" name="regNumber" value="{{ $profile->regNumber ?? NULL }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Email</label>
                                <input type="email" name="companyEmail" value="{{ $profile->companyEmail ?? NULL }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Phone Number</label>
                                <input type="number" name="companyPhone" value="{{ $profile->companyPhone ?? NULL }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Address</label>
                                <textarea name="companyAddress" class="form-control" rows="4"
                                    required>{{ $profile->companyAddress ?? NULL }}"</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Location</label>
                                <input type="text" name="companyLocation" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="">Company Logo</label>
                                <input type="file" name="companyLogo" class="form-control" accept=".png,.jpeg,.jpg"
                                    required>
                            </div>
                        </div>
                        {{-- --}}
                        <hr>
                        <h5>Kindly add http or https</h5>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Website</label>
                                <input type="url" name="companyWebsite" value="{{ $profile->companyWebsite ?? NULL }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Facebook</label>
                                <input type="url" name="companyFacebook" value="{{ $profile->companyFacebook ?? NULL }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Twitter</label>
                                <input type="url" name="companyTwitter" value="{{ $profile->companyTwitter ?? NULL }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Company Instagram</label>
                                <input type="url" name="companyInstagram"
                                    value="{{ $profile->companyInstagram ?? NULL }}" class="form-control">
                            </div>
                        </div>
                        {{-- --}}
                        <hr>
                        <h5>Kindly add bank details</h5>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="">Bank Name</label>
                                <input type="text" name="bankName" class="form-control"
                                    value="{{ $profile->bankName ?? NULL }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Account Name</label>
                                <input type="text" name="accountName" value="{{ $profile->accountName ?? NULL }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">Account Number</label>
                                <input type="text" name="accountNumber" value="{{ $profile->accountNumber ?? NULL }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">PayStack ID</label>
                                <input type="text" name="payStackID" value="{{ $profile->payStackID ?? NULL }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="">PayPal ID</label>
                                <input type="text" name="payPalID" value="{{ $profile->payPalID ?? NULL }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-lg">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection