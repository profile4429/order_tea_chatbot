@extends('frontend/layout/master')
@section('title')
    Chi tiết
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail.css') }}">
    <div class="page-header mt-3">

        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><strong><a href="{{ route('ViewHome') }}" style="text-decoration: none">Trang
                            chủ</a></strong></li>
                <li class="breadcrumb-item"><strong><a href="#"
                            style="text-decoration: none">{{ $category_name }}</a></strong></li>
            </ol>
        </div>
    </div>
    <div class="container my-3">
        <div class="card-body my-2">
            <div class="row">
                <div class="col-lg-4">
                    @foreach ($products as $product)
                        <img class="img-fluid rounded mx-auto d-block h-100 w-100" style="object-fit: cover"
                            src="{{ asset('/images/' . $product->image) }}" alt="" />
                    @endforeach

                </div>
                <div class="col-lg-4">
                    @foreach ($products as $product)
                        <h5><strong>{{ $product->title }}</strong></h5>
                    @endforeach
                    <h4 class="d-flex">

                        @foreach ($products as $product)
                            @php
                                $price_format = number_format($product->price) . ' VNĐ';
                            @endphp
                            <h5 style="color: #ce1f25">Đơn giá: {{ $price_format }}</h5>
                        @endforeach
                    </h4>
                    <p class="fs--1 mb-1"> <span>Chi phí vận chuyển: </span><strong>Miễn phí vận chuyển</strong></p>
                    <p class="fs--1">Trạng thái: <strong class="text-success">Còn hàng</strong></p>
                    <div class="row">
                        <div class="col-auto pe-0 mb-3">
                            <div class="input-group input-group-sm" data-quantity="data-quantity">
                                <button class="btn btn-sm btn-outline-secondary border border-300 qty-down"
                                    data-field="input-quantity" data-type="minus">-</button>
                                <input class="form-control text-center input-quantity input-spin-none quantity"
                                    type="number" min="1" value="1" style="max-width: 50px" />
                                <button class="btn btn-sm btn-outline-secondary border border-300 qty-up"
                                    data-field="input-quantity" data-type="plus">+</button>
                            </div>
                        </div>
                    </div>
                    @foreach ($products as $item)
                        <button class="btn btn-primary me-1 mb-1 AddToCart" data-id={{ $item->id }} type="button">Thêm
                            vào giỏ hàng</button>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="overflow-hidden">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item-tab"><a class="nav-link-tab  active ps-0" id="description-tab"
                                    data-bs-toggle="tab" href="#tab-description" role="tab"
                                    aria-controls="tab-description" aria-selected="true">Mô tả</a></li>
                            <li class="nav-item-tab"><a class="nav-link-tab px-2 px-md-3" id="specifications-tab"
                                    data-bs-toggle="tab" href="#tab-specifications" role="tab"
                                    aria-controls="tab-specifications" aria-selected="false">Hướng dẫn đặt hàng</a></li>
                            <li class="nav-item-tab"><a class="nav-link-tab px-2 px-md-3" id="reviews-tab"
                                    data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews"
                                    aria-selected="false">Đánh giá</a></li>
                        </ul>
                        <div class="tab-content overflow-scroll" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="mt-3">
                                    @foreach ($products as $item)
                                        <p>
                                            {!! $item->desc !!}
                                        </p>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-specifications" role="tabpanel"
                                aria-labelledby="specifications-tab">
                                <table class="table fs--1 mt-2">
                                    <tbody>
                                        <tr>
                                            <td class="bg-100" style="width: 20%;">Bước 1</td>
                                            <td>Thêm sản phẩm vào giỏ hàng</td>
                                        </tr>

                                        <tr>
                                            <td class="bg-100" style="width: 20%;">Bước 2</td>
                                            <td>Điền thông tin nhận hàng, chọn phương thức thanh toán và tiến hành đặt hàng
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="bg-100" style="width: 20%;">Bước 3</td>
                                            <td>Chờ nhận cuộc gọi xác nhận lại đơn hàng trước khi giao hàng</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="row mt-3">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <div class="mb-1"><span class="fa fa-star text-warning fs--1"></span><span
                                                class="fa fa-star text-warning fs--1"></span><span
                                                class="fa fa-star text-warning fs--1"></span><span
                                                class="fa fa-star text-warning fs--1"></span><span
                                                class="fa fa-star text-warning fs--1"></span><span
                                                class="ms-3 text-dark fw-semi-bold"></span>
                                        </div>
                                        <p>Sản phẩm chất lượng, phục vụ tận tâm 😍</p>
                                        <p class="fs--1 mb-2 text-600">Đánh giá với Nguyễn Hoàng Long năm 2023</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </div>
    
    <div class="container">
        <h5 style="color: #000000"><strong style="color: #ce1f25">Các sản phẩm khác</strong>
        </h5>
        <div class="category-slider">

            @foreach ($product_list as $item)
                <div class="card shadow-sm mx-3 border-0" style="height: 100%;">
                    <div class="p-2 box-shadows rounded">
                        <a href="{{ route('ViewDetail', ['id' => $item->id]) }}">
                            <img class="bd-placeholder-img card-img-top rounded" style="height: 220px; object-fit: cover;"
                                src="{{ asset('/images/' . $item->image) }}" width="100%" alt="{{ $item->title }}">
                        </a>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <strong>
                            <h6 class="card-title text-center">{{ $item->title }}</h6>
                        </strong>
                        @php
                            $itemPrice = $item->price;
                            $formattedPrice = 'Giá: ' . number_format($itemPrice);
                        @endphp
                        <h6 style="color: red" class="text-center"><strong>{{ $formattedPrice }}</strong></h6>
                        <div class="text-center">
                            <a href="{{ route('AddToCart', ['id' => $item->id]) }}">
                                <button class="btn btn-danger text-center" type="button">Thêm vào
                                    giỏ</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!--danhmuc-->
    <script src="{{ asset('frontend/js/detail.js') }}"></script>
    <script>
        const qtyDownBtn = document.querySelector('.qty-down');
        const qtyUpBtn = document.querySelector('.qty-up');
        const quantityInput = document.querySelector('.quantity');
        qtyDownBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        qtyUpBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        $(document).ready(function() {
            $(document).on('click', '.AddToCart', function(e) {
                let quantity = $('.quantity').val();
                let id = $(this).data('id');

                $.ajax({
                    url: '{{ route('AddCart') }}',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        quantity: quantity,
                        id: id,
                    },
                    success: function(data) {
                        if (data.error == 0) {
                            window.location.reload();
                        } else {
                            alert('Thêm that bai');
                        }
                    }
                });

            })
        });
    </script>
@endsection
