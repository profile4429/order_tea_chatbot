@extends('backend/layout/master')
@section('header_name')
    Quản lý sản phẩm
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Chỉnh sửa thông tin người dùng hiển thị</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('updateContact') }}">
                @csrf
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" class="form-control" value="{{ $contacts->fullname }}"
                        id="name" name="fullname" placeholder="Nhập họ và tên">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $contacts->email }}"
                        placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $contacts->phone }}"
                        placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook:</label>
                    <input type="text" class="form-control" name="facebook" value="{{ $contacts->facebook }}" id="facebook"
                        placeholder="Nhập địa chỉ Facebook của bạn">
                </div>
                <div class="form-group">
                    <label for="zalo">Zalo:</label>
                    <input type="text" class="form-control" name="zalo" value="{{ $contacts->zalo }}" id="zalo"
                        placeholder="Nhập số điện thoại Zalo của bạn">
                </div>
                <div class="form-group">
                    <label for="bank_name">Tên ngân hàng:</label>
                    <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ $contacts->bank_name }}"
                        placeholder="Nhập tên ngân hàng">
                </div>
                <div class="form-group">
                    <label for="bank_number">Nhập số tài khoản:</label>
                    <input type="text" class="form-control" name="bank_number" id="bank_number" value="{{ $contacts->bank_number }}"
                        placeholder="Nhập số tài khoản ngân hàng">
                </div>
                <div class="form-group">
                    <label for="bank_address">Nhập chi nhánh ngân hàng:</label>
                    <input type="text" class="form-control" name="bank_address" id="bank_address" value="{{ $contacts->bank_address }}"
                        placeholder="Nhập địa chỉ ngân hàng">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3">Cập nhật thông tin</button>
                </div>

            </form>
        </div>
    </div>
@endsection
