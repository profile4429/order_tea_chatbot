@extends('frontend/layout/master')
@section('title')
    Giỏ hàng
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="bg-orange p-3" style="background-color: #951E21">
                    <h6 class="text-center text-white mb-0">Giỏ hàng</h6>
                </div>
                <div class="table-responsive">
                    <table class="table text-center align-middle table-bordered">
                        @if (session('cart'))
                            <thead>
                                <tr class="bg-light">
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Khối lượng(kg)</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (session('cart') as $id => $item)
                                    <tr data-id="{{ $id }}">
                                        <td class="product-thumbnail">
                                            <div style=" height: 220px; overflow: hidden;">
                                                <img src="{{ asset('/images/' . $item['image']) }}" alt="#" class="rounded mx-auto d-block img-fluid"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
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
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-light qty-down" type="button"><i
                                                            class="fas fa-minus fa-xs"></i></button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity cart_update"
                                                    style="width:50px" value="{{ $item['quantity'] }}" min="1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light qty-up" type="button"><i
                                                            class="fas fa-plus fa-xs"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>{{ $total }}</span>
                                        </td>
                                        <td class="action">
                                            <span class="text-danger fas fa-trash-alt cart_remove"></span>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif(!session('cart'))
                                <h6 class="text-center my-3">Giỏ hàng trống!</h6>
                        @endif

                        </tbody>

                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    @if (session('cart'))
                        <a href="{{ route('ViewCheckout') }}" class="me-2">
                            <button class="btn btn-danger">Tiến hành đặt hàng</button>
                        </a>
                    @endif
                    <a href="{{ route('ViewHome') }}">
                        <button class="btn btn-dark" type="button">Tiếp tục mua hàng</button>
                    </a>
                </div>
                <hr class="my-5">
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();
            let ele = $(this);

            $.ajax({
                url: '{{ route('UpdateCart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?")) {
                $.ajax({
                    url: '{{ route('RemoveCart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

        $(document).ready(function() {
            // tăng giảm số lượng sản phẩm
            $('.qty-up').on('click', function() {
                let input = $(this).parent().siblings('input.quantity');
                let newVal = parseInt(input.val()) + 1;
                input.val(newVal).change();
            });
            $('.qty-down').on('click', function() {
                let input = $(this).parent().siblings('input.quantity');
                let newVal = parseInt(input.val()) - 1;
                if (newVal >= 1) {
                    input.val(newVal).change();
                }
            });
        });
    </script>
@endsection
