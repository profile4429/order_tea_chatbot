@extends('frontend/layout/master')
@section('title')
    Chi tiết
@endsection

@section('content')

    <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center span_title">{{ $policys->title }}</h1>
                    <p>{!! $policys->desc !!}</p>
                </div>
            </div>
    </div>
    <style>
        .span_title {
            font-weight: bold;
            color: #88191c;
            font-size: 2rem;
        }
    </style>
@endsection
