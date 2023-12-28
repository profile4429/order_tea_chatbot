<!-- Header 1 - Top Header -->
<header class="navbar navbar-expand-lg text-white" style="background-color: #ffffff">
    <div class="container">
        <div class="wrap-logo">
            <a href="#" style="display: flex; align-items: center;">
                <img style="max-width: 250px; height:auto" src="https://phuclong.com.vn/images/common/delivery.png"
                    alt="Logo">
            </a>
        </div>
        <form class="" style="width: 50%;">
            <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                aria-label="Search" style="width: 100%; border-radius: 25px;" />
        </form>
        <div class="d-flex">
            <a class="nav-link">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-search-location"></span></span><span class="nav-link-text ps-1">Liên hệ đặt hàng: @foreach ($contact as $item )
                                {{$item->phone}}
                            @endforeach</span>
                </div>
            </a>
        </div>
    </div>
</header>

<!-- Header 2 - Mid Header -->
<header class="navbar navbar-expand-lg text-white sticky-top" style="background-color: #ffffff">
    <div class="container">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="nav-link" href="{{ route('ViewHome') }}" style="text-decoration: none;">Trang chủ</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                {{-- @foreach ($category as $item)
                    <li class="nav-item"><a href="{{ route('ViewListProduct') }}?id={{ $item->id }}"
                            class="nav-link" style="text-decoration: none;">{{ $item->name }}</a></li>
                @endforeach --}}
                <li class="nav-item"><a href="{{ route('ViewListProduct') }}?id={{ $item->id }}"
                    class="nav-link" style="text-decoration: none;">Cà Phê</a></li>
                    <li class="nav-item"><a href="{{ route('ViewListProduct') }}?id={{ $item->id }}"
                        class="nav-link" style="text-decoration: none;">Trà</a></li>
                        <li class="nav-item"><a href="{{ route('ViewListProduct') }}?id={{ $item->id }}"
                            class="nav-link" style="text-decoration: none;">Thức uống</a></li>
                            <li class="nav-item"><a href="{{ route('ViewListProduct') }}?id={{ $item->id }}"
                                class="nav-link" style="text-decoration: none;">Sản phẩm</a></li>
                                <li class="nav-item"><a href="{{ route('ViewListProduct') }}?id={{ $item->id }}"
                                    class="nav-link" style="text-decoration: none;">Khuyến mãi</a></li>
                <li class="nav-item"><a href="{{route('View_News')}}" class="nav-link" style="text-decoration: none;">Tin Tức</a></li>
                <li class="nav-item"><a href="{{route('View_Contact')}}" class="nav-link" style="text-decoration: none;">Liên Hệ</a></li>

            </ul>
        </div>
        <a class="nav-link" href="{{ route('ViewCart') }}">
            <div class="d-inline-block notification-indicator notification-indicator-warning fa-icon-wait">
                <span class="fa-solid fa-cart-shopping fa-lg" data-fa-transform="down-2"></span> Giỏ hàng
                @if (session('cart'))
                    <span class="badge bg-danger">{{ count(session('cart')) }}</span>
                @endif
            </div>
        </a>
    </div>
</header>
<style>
    .nav-link {
        font-weight: bold;
        font-size: 15px;
        text-transform: uppercase;
        display: block;
        color: rgb(110, 107, 107);
    }

    .nav-link:hover {
        color: rgb(255, 0, 0);
    }
</style>
