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
                <ul>
                    <li><a href="{{ route('sellerDashboard') }}">Carrot</a></li>
                    <li>{{ $pageTitle }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cr-card" id="ordertbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Recent Orders</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="order-table">
                            <div class="table-responsive tbl-1200">
                                <table id="recent_order" class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>Quantity</th>
                                            <th>Amount ($)</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td>
                                                <img class="cat-thumb"
                                                    src="{{ asset('products/'.$item->products->main_picture) }}"
                                                    alt="clients Image"><span class="name">{{ $item->products->name
                                                    }}</span>
                                            </td>
                                            <td>{{ $item->customer->firstName .' '.$item->customer->lastName }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->products->price,2) }}</td>
                                            <td>{{ $item->products->quantity }}</td>
                                            @if ($item->status == 'pending')
                                            <td class="text-uppercase text-primary">{{ $item->status }}</td>
                                            @elseif ($item->status == 'paid')
                                            <td class="text-uppercase text-success">{{ $item->status }}</td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button type="button"
                                                        class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" data-display="static">
                                                        <span class="sr-only"><i class="ri-settings-3-line"></i></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#view{{ $item->id }}">View</a>
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#edit{{ $item->id }}">Edit</a>
                                                        {{-- <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $item->id }}">Delete</a> --}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- view --}}
                                        <div class="modal fade" id="view{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">View Full
                                                            Details</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 text-center">

                                                                <h6 class="mb-3">Order ID<br> <strong>{{ $item->orderID
                                                                        }}</strong></h6>
                                                                <h6 class="mb-3">Customer<br><strong>{{
                                                                        $item->customer->firstName .'
                                                                        '. $item->customer->lastName }}</strong></h6>
                                                                <h6 class="mb-3">Product<br><strong>{{
                                                                        $item->products->name
                                                                        }}</strong></h6>
                                                                <h6 class="mb-3">Quantity<br><strong>{{
                                                                        $item->quantity
                                                                        }}</strong></h6>
                                                                <h6 class="mb-3">Amount ($)<br><strong>{{
                                                                        $item->price
                                                                        }}</strong></h6>
                                                                <h6 class="mb-3">Payment Status<br><strong
                                                                        class="text-uppercase">{{
                                                                        $item->status
                                                                        }}</strong></h6>
                                                                <h6 class="mb-3">Payment Method<br><strong
                                                                        class="text-uppercase">{{
                                                                        $item->payment
                                                                        }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- edit --}}
                                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update
                                                            Payment Status</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    @if ($item->status == 'paid')
                                                    <h1 class="text-center lead">This product has already been paid for.
                                                    </h1>
                                                    <br>
                                                    @else
                                                    <form action="{{ route('editOrder') }}" method="POST"
                                                        class="cr-content-form needs-validation"
                                                        onsubmit="showConfirmation(this, event, 'update');"
                                                        enctype="multipart/form-data" novalidate>
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Update Payment Status</label>
                                                                        <select name="status" class="form-control"
                                                                            required>
                                                                            <option value="paid">Paid</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="">Payment Method</label>
                                                                        <select name="payment" class="form-control"
                                                                            required>
                                                                            <option>-- Select --</option>
                                                                            <option value="cash">Cash on delivery
                                                                            </option>
                                                                            <option value="card">Card / POS
                                                                            </option>
                                                                            <option value="transfer">Bank Transfer
                                                                            </option>
                                                                        </select>
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
                                                    @endif
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
</div>
@endsection
