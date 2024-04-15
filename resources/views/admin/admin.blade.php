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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    {{"Create ". $pageTitle }}
                </button>
                {{-- create --}}
                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('adminStore') }}" method="POST"
                                class="cr-content-form needs-validation"
                                onsubmit="showConfirmation(this, event, 'submit');" enctype="multipart/form-data"
                                novalidate>
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input name="firstName" class="form-control here slug-title" type="text"
                                                    value="{{ old('firstName') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input name="lastName" class="form-control here slug-title" type="text"
                                                    value="{{ old('lastName') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input name="email" class="form-control here slug-title" type="email"
                                                    value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input name="phone" class="form-control here slug-title" type="text"
                                                    value="{{ old('phone') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" class="form-control here slug-title"
                                                    type="password" value="{{ old('password') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
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
                                        <td>{{ $item->firstName.' '.$item->lastName }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
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
                                                <form action="{{ route('adminUpdate') }}" method="POST"
                                                    class="cr-content-form needs-validation"
                                                    onsubmit="showConfirmation(this, event, 'update');"
                                                    enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input name="firstName"
                                                                        class="form-control here slug-title" type="text"
                                                                        value="{{ $item->firstName }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input name="lastName"
                                                                        class="form-control here slug-title" type="text"
                                                                        value="{{ $item->lastName }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                                    <input name="phone"
                                                                        class="form-control here slug-title" type="text"
                                                                        value="{{ $item->phone }}" required>
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
                                                <form action="{{ route('adminDelete') }}" method="POST"
                                                    class="cr-content-form needs-validation"
                                                    onsubmit="showConfirmation(this, event, 'delete');"
                                                    enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <h4>Are you sure you want to delete this admin?</h4>
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
