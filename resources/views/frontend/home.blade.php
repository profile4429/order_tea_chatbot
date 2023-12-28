@extends('frontend/layout/master')
@section('title')
    Trang Chủ
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">


    <!--silder-->
    <div class="container-fluid">
        <section>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($picture_top as $index => $item)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <a href="{{ $item->url }}">
                                <img src="{{ asset('/images/' . $item->image) }}" class="d-block w-100" alt="slide">
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>
    <!--end silder-->

    <div class="container mt-5">
        <div class="row">
          <!-- Column with Image -->
          <div class="col-md-6">
            <img style="max-height: 500px" src="https://phuclong.com.vn/uploads/post/20649d183ca5f1-bannertrangchu.jpg" alt="Image" class="img-fluid">
          </div>
      
          <!-- Column with Content -->
          <div class="col-md-6">
            <h3 style="color: #0C713D">TỪ NHỮNG MẦM TRÀ, CHÚNG TÔI TẠO RA NIỀM ĐAM MÊ</h3>
            <p>Trải qua hơn 50 năm chắt chiu tinh hoa từ những búp trà xanh và hạt cà phê thượng hạng cùng mong muốn mang lại cho khách hàng những trải nghiệm giá trị nhất khi thưởng thức, Tiệm Trà liên tục là thương hiệu tiên phong với nhiều ý tưởng sáng tạo đi đầu trong ngành trà và cà phê. </p>
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row">
          <!-- Column with Content -->
          <div class="col-md-6">
            <h2 style="color: #0C713D">ĐỘI NGŨ NHÂN VIÊN TRÀN ĐẦY NHIỆT HUYẾT</h2>
            <p>Trong suốt quá trình hoạt động và phát triển, đội ngũ quản lý và nhân viên của Tiệm Trà Coffee & Tea, qua bao thế hệ, đã cùng nhau xây dựng, nuôi dưỡng niềm đam mê dành cho trà và cà phê với mong muốn được thử thách bản thân trong ngành dịch vụ năng động và sáng tạo.</p>
          </div>
      
          <!-- Column with Image -->
          <div class="col-md-6">
            <img style="max-height: 500px" src="https://phuclong.com.vn/uploads/post/024b7d5e73bbb2-8ed98f521583690431954887e772tuyendung1.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>



    {{-- <div class="container mt-3">
        <h5 class="text-center m-2" style="color: #4f5d77"><strong style="color: #ce1f25">Sản Phẩm</strong> Nổi Bật</h5>
        <div class="row row-cols-1 row-cols-md-5 mb">
            @foreach ($top_product as $item)
                <div class="col mb-2">
                    <div class="card shadow-sm" style="height: 100%;">
                        <a href="{{ route('ViewDetail') }}?id={{ $item->id }}">
                            <img class="bd-placeholder-img card-img-top" style="height: 220px; object-fit: cover;"
                                src="{{ asset('/images/' . $item->image) }}" width="100%"></a>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <strong>
                                <h6 class="card-title" style="color: #4f5d77">{{ $item->title }}</h6>
                            </strong>
                            @php
                                $formatPrice = number_format($item->price);
                                
                            @endphp
                            <h5 style="color: red" class="text-center"><strong>{{ $formatPrice }}</strong></h5>
                            <div class="text-center">
                                <a href="{{ route('AddToCart', ['id' => $item->id]) }}">
                                    <button class="btn btn-danger me-1 mb-1 text-center" type="button">Thêm vào
                                        giỏ</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    <!--banner-->
    <section>
        <div class="container my-3 d-flex justify-content-center">
            @foreach ($picture_mid as $item)
                <img src="{{ asset('/images/' . $item->image) }}" alt="" class="img-fluid w-100">
            @endforeach
        </div>
    </section>
    <!--end banner-->

    <!--danhmuc-->
    <section>
        <div class="container">
            <h5 class="text-center m-2" style="color: #4f5d77"><strong style="color: #0c713d">Sản phẩm</strong> nổi bật
            </h5>
            <div class="category-slider">

                @foreach ($menu as $item)
                    <div class="card shadow-sm mx-3" style="height: 100%;">
                        <div class="p-3 box-shadows rounded">
                            <a href="{{ route('ViewListProduct') }}?id={{ $item->id }}">
                                <img class="bd-placeholder-img card-img-top" style="height: 200px; object-fit: cover;"
                                    src="{{ asset('/images/' . $item->image) }}" width="100%"></a>
                        </div>
                        <div class="card-body">
                            <strong>
                                <h6 class="card-title">{{ $item->item_name }}</h6>
                            </strong>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--danhmuc-->

    <!--mid intro-->
    <section>
        <div class="container pb-3">
            <div class="row">
                @foreach ($intro_mid as $item)
                    <div class="col-12 col-md-4 mb-2">
                        <div class=" mt-5 position-relative" style="height: 220px">
                            <img src="{{ asset('/images/' . $item->image) }}" alt="" class="img-fluid w-100 h-100" style="object-fit: cover">
                            <div
                                class="banner-text position-absolute top-50 start-10 end-50 text-center translate-middle-y">
                                <h5 style="color: #F15412">{{ $item->title }}</h5>
                                <p style="color: #4f5d77"><i><strong>{{ $item->desc }}</strong></i></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--end mid intro-->

    <script src="{{ asset('frontend/js/home.js') }}"></script>
@endsection
