@extends('frontend/layout/master')
@section('title')
    Chi tiết
@endsection

@section('content')
    <div class="container">
        <div class="m-2"><span class="span_title">Tin tức</span></div>
        <div class="row row-cols-1 row-cols-md-2 g-5">
            @foreach ($news as $item)
                <div class="col">
                    <div class="card h-100">
                        <a href=""><img class="bd-placeholder-img card-img-top" style="object-fit: cover" height="350px"
                                src="{{ asset('/images/' . $item->image) }}" alt="Linh vuc"></a>
                        <div class="card-body">
                            <h4 class="card-title mt-3" style="transform: translateY(-20px);">{{ $item->title }}</h4>
                            <p class="card-text">{!! $item->desc !!}</p>
                            <p class="card-text"><small class="text-muted">Ngày đăng: {{ $item->date }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>v>
    </div>
@endsection
