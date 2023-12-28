@extends('frontend/layout/master')
@section('title')
    Giỏ hàng
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/checkout.css') }}">

    <div class="container my-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="order_review">
                        <div class="card-title">
                            <h3 class="text-center my-3">Thông tin sản phẩm</h3>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table text-white align-middle">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản phẩm</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $order_date = date('Y-m-d H:i:s');
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $item)
                                            @php
                                                $total += $item['price'] * $item['quantity'];
                                                $formatTotal = number_format($total) . ' VNĐ';
                                                $formatPrice = number_format($item['price']) . ' VNĐ';
                                            @endphp
                                            <tr>
                                                <td class="image product-thumbnail"> <img class="m-2 rounded"
                                                        src="{{ asset('/images/' . $item['image']) }}" alt="#"
                                                        style="width: 320px; height: 220px"></td>
                                                <td>
                                                    <h5 class="m-2" style="color: #ffffff">{{ $item['title'] }}</h5>
                                                    <span class="product-qty">x
                                                        {{ $item['quantity'] }}</span>
                                                </td>
                                                <td>{{ $formatPrice }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <th>Tổng giá sản phẩm:</th>
                                        <td class="product-subtotal" colspan="2">{{ session('cart') ? $formatTotal : 0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phí giao hàng</th>
                                        <td colspan="2"><em>Miễn phí giao hàng</em></td>
                                    </tr>
                                    <tr>
                                        <th>Tổng thanh toán</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">{{ session('cart') ? $formatTotal : 0 }}</span></td>
                                    </tr>


                                </tbody>

                            </table>
                            <a href="{{ route('ViewCart') }}">
                                <button class="btn btn-dark" type="button">Quay lại giỏ hàng</button>
                            </a>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success">
                    <div class="card-body text-white">
                        <form action="{{ route('Checkout') }}" method="post">
                            @csrf
                            <div class="card-title">
                                <h3 class="text-center">Thông tin đặt hàng</h3>
                            </div>
                            <input type="hidden" name="total_money" id="total_money" value="{{ $total }}">
                            <input type="hidden" name="order_date" id="order_date" value="{{ $order_date }}">
                            <input type="hidden" name="status" id="status" value="1">
                            <div class="form-group mb-3">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                    placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập địa chỉ email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Địa chỉ nhận hàng</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Nhập địa chỉ nhận hàng">
                            </div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Phương thức thanh toán</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input type="radio" class="form-check-input" name="payment_option" value="1"
                                            id="exampleRadios3" required>
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                            data-bs-target="#cashOnDelivery" aria-expanded="false"
                                            aria-controls="cashOnDelivery">Thanh toán khi nhận hàng</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input type="radio" class="form-check-input" name="payment_option" value="2"
                                            id="exampleRadios4" required>
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                            data-bs-target="#cardPayment" aria-expanded="false"
                                            aria-controls="cardPayment">Chuyển khoản (miễn phí ship)</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input type="radio" class="form-check-input" name="payment_option"
                                            value="3" id="exampleRadios5" required>
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                            data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">Thanh
                                            toán
                                            qua ví điện tử (miễn phí ship)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-3">
                                <button type="submit" id="Checkout" class="btn btn-danger">Đặt hàng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            $(document).on('click', '#Checkout', function(e) {
                let fullname = $('#fullname').val();
                let email = $('#email').val();
                let phone_number = $('#phone_number').val();
                let address = $('#address').val();
                let total_money = $('#total_money').val();
                let status = 1;



                let infoDatHang = {
                    fullname: fullname,
                    email: email,
                    phone_number: phone_number,
                    address: address,
                    total_money : total_money,
                    status:status,
                };
                $.ajax({
                    url: '{{ route('Checkout') }}',
                    type: 'post',
                    dataType: 'json',
                    data: infoDatHang,
                    // success: function(data) {
                    //     if (data.success) {
                    //         alert('Đặt hàng thành công');
                    //     } else {
                    //         alert('Đặt hàng thất bại');
                    //     }

                    // },
                    // error: function() {
                    //     alert('Có lỗi xảy ra khi đặt hàng');
                    // }
                });

            })
        });
    </script> --}}
@endsection
