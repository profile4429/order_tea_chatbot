@extends('frontend/layout/master')
@section('title')
    Hoàn thành
@endsection

@section('content')
    <div class="container my-2">
        <div class="row">
            <div class="col-12">
                <div class="bg-orange p-3">
                    <h4 class="text-center mb-0">Cảm ơn bạn đã đặt hàng! Vui lòng liên hệ {{ $contacts->phone }} để được
                        hỗ trợ tốt nhất
                    </h4>
                    <h5 class="text-center mt-3">Tình trạng đơn hàng: <strong style="color: red">
                            @switch($payment)
                                @case(1)
                                    Đang giao hàng
                                @break

                                @case(2)
                                    Chờ chuyển khoản
                                @break

                                @case(2)
                                    Chờ thanh toán

                                    @default
                                        Không xác định
                                    @break
                                @endswitch
                            </strong>
                        </h5>

                    </div>
                    <div class="justify-content-start">
                        @php
                            $format_total = number_format($total) . 'VND';
                        @endphp
                        @switch($payment)
                            @case(1)
                                <p><strong>Chúng tôi đang tiến hành đóng gói và giao hàng</strong></p>
                                <p><strong>Số tiền cần thanh toán: <i style="color: red">{{ $format_total }}</i></strong></p>
                            @break

                            @case(2)
                                <p>Vui lòng chuyển tiền đến số tài khoản : </p>
                                <p><strong>- {{$contacts->bank_name}}</strong></p>
                                <p><strong>- Chủ tài khoản: {{$contacts->fullname}}</strong></p>
                                <p style="color: red"><strong>- Số tài khoản: {{$contacts->bank_number}}</strong></p>
                                <p><strong>- Chi nhánh: {{$contacts->bank_address}}</strong></p>
                                <p><strong>Số tiền cần thanh toán: <i style="color: red">{{ $format_total }}</i></strong></p>
                                <p><strong>Sau khi nhận được tiền. Chúng tôi sẽ tiến hành đóng gói và giao hàng</strong></p>
                            @break

                            @default
                                <p>Không xác định</p>
                            @break
                        @endswitch

                    </div>
                    <div class="card">
                        <h5 class="text-center mt-3">Chi tiết đơn hàng</h5>

                        <div class="bg-orange p-3">

                            <h6 class="text-left mb-1">Họ và tên người nhận: {{ $params['fullname'] }}</h6>
                            <h6 class="text-left mb-1">Email: {{ $params['email'] }}</h6>
                            <h6 class="text-left mb-1">Số điện thoại: {{ $params['phone_number'] }}</h6>
                            <h6 class="text-left mb-1">Địa chỉ nhận hàng: {{ $params['address'] }}</h6>
                            <h6 class="text-left mb-1">Thời gian đặt hàng: {{ $params['order_date'] }}</h6>

                        </div>
                        <div class="table-responsive">
                            <table class="table text-center align-middle table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">Khối lượng(kg)</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cart as $id => $item)
                                        <tr data-id="{{ $id }}">
                                            <td class="product-thumbnail">
                                                <div style=" height: 250px; overflow: hidden;">
                                                    <img src="{{ asset('/images/' . $item['image']) }}" alt="#"
                                                        class="rounded mx-auto d-block img-fluid"
                                                        style="width: 70%; height: 100%; object-fit: cover;">
                                                </div>
                                            </td>
                                            <td>
                                                <strong class="text-orange">{{ $item['title'] }}</strong>
                                            </td>
                                            @php
                                                $itemPrice = $item['price'];
                                                $formattedPrice = number_format($itemPrice);
                                                $total = number_format($item['price'] * $item['quantity']) . ' vnđ';
                                            @endphp
                                            <td class="price" data-title="Price">
                                                <span>{{ $formattedPrice }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="input-group quantity-block">

                                                    <input type="text" class="form-control text-center quantity cart_update"
                                                        style="width:50px" value="{{ $item['quantity'] }}" min="1">

                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>{{ $total }}</span>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                    <hr class="my-5">
                </div>
            </div>
        </div>
    @endsection
