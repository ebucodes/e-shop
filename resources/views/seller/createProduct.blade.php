@section('title',$pageTitle)

@extends('layouts.account.app')

@section('content')
<!-- main content -->
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
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <form action="{{ route('productStore') }}" method="POST"
                            class="cr-content-form needs-validation" onsubmit="showConfirmation(this, event, 'submit');"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row cr-product-uploads">
                                <div class="col-lg-12">
                                    <div class="cr-vendor-upload-detail">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">Product Name</label>
                                                <input type="text" name="name" class="form-control slug-title"
                                                    id="inputEmail4" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Select Categories</label>
                                                <select class="form-control form-select" name="category" required>
                                                    <option value="">-- Select Category--</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="inputEmail4" class="form-label">Main Image</label>
                                                <input type="file" name="main_picture" accept=".png,.jpeg,.jpg"
                                                    class="form-control slug-title" id="inputEmail4" required>
                                            </div>
                                            {{-- <div class="col-md-6 mb-3">
                                                <label class="form-label">Other Images (Select multiple files) </label>
                                                <input type="file" name="other_pictures" multiple
                                                    accept=".png,.jpeg,.jpg" class="form-control slug-title"
                                                    id="inputEmail4" required>
                                            </div> --}}

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Product Description</label>
                                                <textarea class="form-control" name="desc" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Price <span>(In USD)</span></label>
                                                <input type="number" name="price" class="form-control" id="price1"
                                                    required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" id="quantity1"
                                                    required>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn cr-btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection