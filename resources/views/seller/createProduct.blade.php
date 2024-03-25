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
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <form action="" method="POST" class="cr-content-form needs-validation"
                            onsubmit="showConfirmation(this, event, 'submit');" enctype="multipart/form-data"
                            novalidate>
                            @csrf
                            <div class="row cr-product-uploads">
                                <div class="col-lg-4 mb-991">
                                    <div class="cr-vendor-img-upload">
                                        <div class="cr-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="product_main" class="cr-image-upload"
                                                        accept=".png, .jpg, .jpeg" required>
                                                    <label><i class="ri-pencil-line"></i></label>
                                                </div>
                                                <div class="avatar-preview cr-preview">
                                                    <div class="imagePreview cr-div-preview">
                                                        <img class="cr-image-preview"
                                                            src="{{ asset('account/assets/img/product/preview.jpg') }}"
                                                            alt="edit">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="thumb-upload-set colo-md-12">
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload01" class="cr-image-upload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="thumb-preview cr-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview cr-image-preview"
                                                                src="{{ asset('account/assets/img/product/preview-2.jpg') }}"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload02" class="cr-image-upload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="thumb-preview cr-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview cr-image-preview"
                                                                src="{{ asset('account/assets/img/product/preview-2.jpg') }}"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload03" class="cr-image-upload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="thumb-preview cr-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview cr-image-preview"
                                                                src="{{ asset('account/assets/img/product/preview-2.jpg') }}"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload04" class="cr-image-upload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="thumb-preview cr-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview cr-image-preview"
                                                                src="{{ asset('account/assets/img/product/preview-2.jpg') }}"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload05" class="cr-image-upload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="thumb-preview cr-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview cr-image-preview"
                                                                src="{{ asset('account/assets/img/product/preview-2.jpg') }}"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload06" class="cr-image-upload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="thumb-preview cr-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview cr-image-preview"
                                                                src="{{ asset('account/assets/img/product/preview-2.jpg') }}"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="cr-vendor-upload-detail">
                                        <form class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Product Name</label>
                                                <input type="text" class="form-control slug-title" id="inputEmail4">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Select Categories</label>
                                                <select class="form-control form-select" name="category" required>
                                                    <option value="">-- Select Category--</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Product Description</label>
                                                <textarea class="form-control" name="desc" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Price <span>(In USD)</span></label>
                                                <input type="number" class="form-control" id="price1" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="quantity1">
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn cr-btn-primary">Submit</button>
                                            </div>
                                        </form>
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