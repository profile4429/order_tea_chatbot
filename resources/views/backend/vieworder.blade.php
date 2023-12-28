@extends('backend/layout/master')
@section('header_name')
    Quản lý đơn hàng
@endsection

@section('content')
    <!-- Modal view -->
    <div class="modal fade" id="view_modal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <table class="table text-center align-middle table-bordered">

                            <thead>
                                <tr>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Khối lượng(kg)</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <h5 id="total_money">Tổng tiền:</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal view -->

    <!-- Table list-->
    <div class="card">
        <div id="tableExample"
            data-list='{"valueNames":["id", "name", "email", "phone", "address", "time", "payment", "status","action"], "filter":{"key":"payment"}}'>
            <div class="row justify-content-end g-0 mt-3">
                <div class="col-auto px-3">
                    <select class="form-select form-select-sm mb-3" aria-label="Bulk actions"
                        data-list-filter="data-list-filter">
                        <option selected="" value="">Tất cả</option>
                        <option value="0">Đã hủy</option>
                        <option value="1">Chờ xác nhận</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Giao hàng thành công</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive scrollbar">
                <table class="table text-center table-bordered table-striped align-middle fs--1 mb-0">
                    <thead class="bg-100 text-900">
                        <tr>
                            <th class="sort align-middle" data-sort="id">ID</th>
                            <th class="align-middle" data-sort="name">Họ và tên</th>
                            <th class="align-middle" data-sort="phone">Số điện thoại</th>
                            <th class="align-middle" data-sort="phone">Tên Sản phẩm</th>
                            <th class="align-middle" data-sort="address">Địa chỉ nhận hàng</th>
                            <th class="sort align-middle" data-sort="time">Số lượng</th>
                            <th class="align-middle" data-sort="payment">Đơn giá</th>
                            <th class="align-middle" data-sort="payment">Thời gian</th>
                            <th class="align-middle" data-sort="payment">Phương thức</th>


                            <th class="sort align-middle" data-sort="status">Trạng thái</th>
                            <th class="align-middle" data-sort="action">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-purchase-body" data-list-id="tableExample">

                        @foreach ($receipt as $item)
                            <tr>
                                <td>{{ $item->id_receipt }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->phone }}</td>
                                <td>{{ $item->menu->item_name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->sum }}</td>

                                <td style="white-space: nowrap;">{{ date('H:i:s d-m-Y', strtotime($item->create_at)) }}
                                </td>
                                <td class="fs-0">
                                    <div class="d-flex flex-column">
                                        @switch($item->payment_option)
                                            @case(1)
                                                <span class="badge rounded-pill bg-light text-dark">Thanh toán sau khi nhận
                                                    hàng</span>
                                            @break

                                            @case(2)
                                                <span class="badge rounded-pill bg-light text-dark">Chuyển khoản</span>
                                            @break

                                            @case(3)
                                                <span class="badge rounded-pill bg-light text-dark">Ví điện tử</span>
                                            @break

                                            @default
                                                <span class="badge rounded-pill bg-light text-dark">Không xác định</span>
                                        @endswitch
                                    </div>
                                </td>

                                <td class="fs-0 payment">
                                    <div class="d-flex flex-column">
                                        @switch($item->status)
                                            @case('1')
                                                <div data-status="1">
                                                    <a href="{{ route('ChangeStatus') }}?id={{ $item->id_receipt }}&type=accept">
                                                        <span class="badge d-block mb-1 rounded-pill bg-primary">
                                                            Chấp thuận<span class="ms-1 fas fa-redo"
                                                                data-fa-transform="shrink-2"></span>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('ChangeStatus') }}?id={{ $item->id_receipt }}&type=cancel">
                                                        <span class="badge d-block rounded-pill bg-danger">
                                                            Hủy bỏ<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            @break

                                            @case('2')
                                                <a href="{{ route('ChangeStatus') }}?id={{ $item->id_receipt }}&type=success">
                                                    <span class="badge d-block rounded-pill bg-warning" data-status="2">
                                                        Đang giao hàng<span class="ms-1 fas fa-stream"
                                                            data-fa-transform="shrink-2"></span>
                                                    </span>
                                                </a>
                                            @break

                                            @case('3')
                                                <span class="badge rounded-pill badge-subtle-success" data-status="3">
                                                    Giao hàng thành công<span class="ms-1 fas fa-check"
                                                        data-fa-transform="shrink-2"></span>
                                                </span>
                                            @break

                                            @case('0')
                                                <span class="badge rounded-pill badge-subtle-danger" data-status="0">Đã hủy<span
                                                        class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                                                </span>
                                            @break

                                            @default
                                                Không xác định
                                        @endswitch
                                    </div>
                                </td>

                                <td>
                                    <button class="btn btn-link p-0 btnViewOrder" data-id="{{ $item->id_receipt }}"><span
                                            class="text-500 fas fa-eye"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>
        const selectElement = document.querySelector('.form-select');
        selectElement.addEventListener('change', filterOrders);

        function filterOrders() {
            const selectedValue = selectElement.value;
            const orderElements = document.querySelectorAll('.payment');
            orderElements.forEach(function(orderElement) {
                const statusElement = orderElement.querySelector('[data-status]');
                const status = statusElement.getAttribute('data-status');

                if (selectedValue === '' || status === selectedValue) {
                    orderElement.parentNode.style.display = 'table-row';
                } else {
                    orderElement.parentNode.style.display = 'none';
                }
            });
        }
    </script>






    <script>
        document.querySelectorAll(".btnViewOrder").forEach((element) => {
            element.addEventListener("click", function() {
                let order_id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '{{ route('GetOrderID') }}',
                    data: {
                        order_id: order_id,
                    },
                    success: function(response) {
                        let tableBody = $('#view_modal').find('tbody');
                        tableBody.empty();
                        let sum = 0;
                        for (let i = 0; i < response.length; i++) {
                            let item = response[i];
                            let row = `
                         <tr>
                          <td>
                 <div style="height: 150px; overflow: hidden;">
                    <img src="{{ asset('images/${item.image}') }}" alt="#"
                    class="rounded mx-auto d-block img-fluid"
                    style="width: 80%; height: 100%; object-fit: cover;">
                 </div>
                        </td>
                        <td>${item.title}</td>
                        <td>${item.count}</td>
                          <td>${item.price.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}</td>
                       <td>${item.total_money.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}</td>
                    </tr>
                    `;
                            tableBody.append(row);
                            sum += parseFloat(item.total_money);
                        }
                        $('#total_money').text(
                            `Tổng tiền: ${sum.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}`
                        );
                        $('#view_modal').modal('show');
                    },


                    error: function() {
                        alert('lỗi');
                    }
                });

            });
        });
    </script>
@endsection
