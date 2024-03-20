@section('title', $pageTitle)

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
                    <div class="cr-card-content">
                        <div class="table-responsive">
                            <table id="product_list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>IP</th>
                                        <th>Browser</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->action }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->ip }}</td>
                                        <td>{{ $item->userAgent }}</td>
                                        <td>{{ formatDate($item->created_at) }}</td>
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
@endsection