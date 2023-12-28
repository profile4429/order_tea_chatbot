@extends('frontend/layout/master')
@section('title')
    Chi tiết
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">

    <main class="main">
        <div class="page-header mt-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><strong><a href="{{ route('ViewHome') }}" style="text-decoration: none">Trang
                                chủ</a></strong></li>
                    <li class="breadcrumb-item"><strong style="color: #0C713D">Sản phẩm</strong></li>
                </ol>
            </div>
        </div>
        <section class="my-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-grid">
                            <div class="row">
                                @foreach ($product as $item)
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                        <div class="card shadow-sm" style="height: 100%;">
                                            <a href="{{ route('ViewDetail') }}?id={{ $item->id }}">
                                                <img class="bd-placeholder-img card-img-top"
                                                    style="height: 250px; object-fit: cover;"
                                                    src="{{ asset('/images/' . $item->image) }}" width="100%"></a>
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <strong>
                                                    <h5 class="card-title text-center">{{ $item->title }}</h5>
                                                </strong>
                                                @php
                                                    $price_format = number_format($item->price) . ' đ';
                                                @endphp
                                                <h5 style="color: #0C713D" class="text-center"><strong>
                                                        {{ $price_format }}</strong></h5>

                                                        <div class="text-center">
                                                            <a href="{{ route('AddToCart', ['id' => $item->id]) }}">
                                                                <button class="btn btn-outline-success me-1 mb-1" type="button"
                                                                    style="color: #0C713D">Đặt hàng</button>
                                                            </a>
                                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- <script src="{{ asset('frontend/js/product.js') }}"></script> --}}
@endsection
