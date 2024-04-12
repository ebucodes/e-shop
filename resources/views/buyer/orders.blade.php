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
                    <li><a href="{{ route('sellerDashboard') }}">{{ config('app.name') }}</a></li>
                    <li>{{ $pageTitle }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cr-card" id="ordertbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Recent Orders</h4>

                    </div>
                    <div class="cr-card-content card-default">
                        <div class="order-table">
                            <div class="table-responsive tbl-1200">
                                <table id="recent_order" class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price ($)</th>
                                            <th>Amount Paid ($)</th>
                                            <th>Status</th>
                                            <th>Payment Method</th>
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
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->products->price,2) }}</td>
                                            <td><strong>{{ number_format($item->products->price *
                                                    $item->quantity,2)
                                                    }}</strong></td>
                                            @if ($item->status == 'pending')
                                            <td class="text-uppercase text-primary">{{ $item->status }}</td>
                                            @elseif ($item->status == 'paid')
                                            <td class="text-uppercase text-success">{{ $item->status }}</td>
                                            @endif
                                            <td class="text-uppercase">{{ $item->payment }}</td>
                                        </tr>
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
