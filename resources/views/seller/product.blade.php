@section('title',config('app.name') .' | '. $pageTitle)
@extends('layouts.account.app')

@section('content')
<!-- main content -->
<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5>{{ $pageTitle }}</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default product-list">
                    <div class="cr-card-content ">
                        <div class="table-responsive">
                            <table id="product_list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            @if ($item->status == 'in_stock')
                                            <span class="text-success text-uppercase">{{'In Stock'}}</span>
                                            @elseif($item->status == 'out_of_stock')
                                            <span class="text-danger text-uppercase">{{ 'Out of Stock' }}</span>
                                            @endif
                                        </td>
                                        <td>{{ formatDate($item->created_at) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button type="button"
                                                    class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    data-display="static">
                                                    <span class="sr-only"><i class="ri-settings-3-line"></i></span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $item->id }}">Edit</a>
                                                    {{-- <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#image{{ $item->id }}">Edit Image</a> --}}
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $item->id }}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- edit --}}
                                    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('productUpdate') }}" method="POST"
                                                    onsubmit="showConfirmation(this, event, 'update');"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input name="name"
                                                                        class="form-control here slug-title" type="text"
                                                                        value="{{ $item->name }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label>Category</label>
                                                                    <select name="category" class="form-control"
                                                                        required>
                                                                        <option value="{{ $item->category }}">{{
                                                                            $item->cat->name }}</option>
                                                                        @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">{{
                                                                            $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea name="desc" class="form-control"
                                                                        required>{{ $item->desc }}</textarea>
                                                                </div>
                                                            </div>


                                                            <div class="col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input name="price"
                                                                        class="form-control here slug-title"
                                                                        type="number" value="{{ $item->price }}" min="0"
                                                                        step="any" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label>Quantity</label>
                                                                    <input name="quantity"
                                                                        class="form-control here slug-title"
                                                                        type="number" value="{{ $item->quantity }}"
                                                                        min="0" step="any" required>
                                                                </div>
                                                            </div>
                                                            {{--
                                                            <div class="col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label>Image</label>
                                                                    <input type="file" name="main_picture"
                                                                        accept=".png,.jpeg,.jpg"
                                                                        class="form-control slug-title" id="inputEmail4"
                                                                        required>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- image --}}
                                    <div class="modal fade" id="image{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('productUpdateImage') }}" method="POST"
                                                    onsubmit="showConfirmation(this, event, 'update');"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6 mb-3">
                                                                <div class="form-group">
                                                                    <label>Image</label>
                                                                    <input type="file" name="main_picture"
                                                                        accept=".png,.jpeg,.jpg"
                                                                        class="form-control slug-title" id="inputEmail4"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- delete --}}
                                    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('categoryDelete') }}" method="POST"
                                                    class="cr-content-form needs-validation"
                                                    onsubmit="showConfirmation(this, event, 'delete');"
                                                    enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <h4>Are you sure you want to delete this category?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
