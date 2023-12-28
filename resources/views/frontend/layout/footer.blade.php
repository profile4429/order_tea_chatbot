<div>
    <footer class="text-center text-lg-start text-white" style="background-color: #0c713d;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Hỗ trợ khách hàng</h6>
                    @foreach ($policy as $item)
                        <p>
                            <a href="{{ route('View_Policy') }}?id={{ $item->id }}" class="text-white"
                                style="text-decoration: none">
                                {{ $item->title }}
                            </a>
                        </p>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Thông tin liên hệ</h6>
                    @foreach ($contact as $item)
                        <p><i class="fas fa-home mr-3"></i> {{ $item->address }}</p>
                        <p><i class="fas fa-envelope mr-3"></i> {{ $item->email }}</p>
                        <p><i class="fas fa-print mr-3"></i> Số điện thoại: {{ $item->phone }}</p>
                        <p><i class="fas fa-phone mr-3"></i> Zalo: {{ $item->zalo }}</p>
                        <p><i class="fas fa-print mr-3"></i> Facebook: {{ $item->facebook }}</p>
                    @endforeach
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Liên kết với chúng tôi qua các kênh </h6>
                    <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100089128183853"
                        data-tabs="timeline" data-width="400" data-height="180" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/profile.php?id=100089128183853"
                            class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/profile.php?id=100089128183853">Trà Sữa Bing Bong</a>
                        </blockquote>
                    </div>

                    <h6 class="text-uppercase my-2 font-weight-bold">facebook cá nhân:</h6>
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                        role="button"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
            <hr class="mb-4" />
            <section class="mb-4 text-center">
                <a class="btn btn-outline-light btn-floating m-1 btnfb" href="#" aria-label="fb" role="button"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 btngoogle" aria-label="gg" href="#"
                    role="button"><i class="fab fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 btnins" aria-label="ins" href="#"
                    role="button"><i class="fab fa-instagram"></i></a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            Copyright © 2023 một sản phẩm của ver2
        </div>
    </footer>
</div>
