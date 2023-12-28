@extends('backend/layout/master')
@section('header_name')
    Quản lý người dùng
@endsection

@section('content')
    <div class="main-content">

        <h1 class="mb-4">Thông tin khách hàng</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                       
                            {{ $item->phone }}
                    
                    </td>
                        <td>
                                <button class="btn btn-success">Xóa</button>
                                <button class="btn btn-warning">Sửa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
