@extends('frontend/layout/master')
@section('title')
    Liên hệ
@endsection

@section('content')
    <div class="container my-3">

        <div class="card">
            <div class="card-header text-center">
              <h6>Mọi thông tin cơ bản vui lòng liên hệ</h6>
            </div>
            <div class="card-body">
                <h6 class="card-text">Chủ shop: {{ $contacts ->fullname }}</h6>
                <p class="card-text">Zalo: {{ $contacts->zalo }}</p>
                <p class="card-text">Facebook: <a href="{{ $contacts->facebook }}">{{ $contacts->facebook }}</a></p>
                <p class="card-text">Địa chỉ: {{ $contacts->address }}</p>
                <p class="card-text">Tên chủ tài khoản: {{ $contacts->fullname }}</p>
                <p class="card-text">Ngân hàng: {{ $contacts->bank_name }}</p>
                <p class="card-text">Số tài khoản: {{ $contacts->bank_number }}</p>
                <p class="card-text">Chi nhánh: {{ $contacts->bank_address }}</p>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17628.843672054605!2d107.68640257583739!3d12.002263795298978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3173c738c19dd823%3A0xe740478c8a5a6a00!2zVHJ1bmcgVMOibSBIw6BuaCBDaMOtbmggQ8O0bmcgVOG7iW5oIMSQ4bqvayBOw7RuZw!5e1!3m2!1svi!2s!4v1683250376820!5m2!1svi!2s"
                        width="1250" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
