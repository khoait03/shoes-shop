@extends('frontend.index')
<!-- Title -->
@section('title')
    Về chúng tôi
@endsection

<!-- Banner -->
@section('banner')
    <!-- Start banner Area -->

    <!-- End banner Area -->
@endsection

<!-- Content -->
@section('content')
    <!-- Start Content Area -->
    <section class="about-page mt-5 mb-4">
        <div class="container-fluid px-5">
            @foreach ($about as $data)
                
           
            <div class="row justify-content-center overflow-hidden">
                <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="container-fluid px-0">
                        <div class="section-title">
                            <h1>{{$data->faq_name}}</h1>
                            <p>Nơi Trải Nghiệm Thế Giới Giày Thể Thao Chính Hãng</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <div class="w-100 box__shadow p-3 rounded">
                        <p>
                            {!!$data->faq_content!!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row justify-content-center overflow-hidden">
                <div class="col-lg-6 text-center mt-3" data-aos="fade-up" data-aos-duration="2000">
                    <div class="container-fluid px-0">
                        <div class="section-title">
                            <h1>Thành viên</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-team-about">
                    <div class="card border-0 w-100 box__shadow">
                        <div class="position-relative">
                            <img src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg"
                                class="card-img-top img-auth-team" alt="Nguyễn Tấn Duy">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round"
                                    href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="card-body mt-4 p-3">
                            <h4 class="card-title fw-bold text-center">Nguyễn Văn A</h4>
                            <p class="text-center">
                                CEO
                            </p>
                        </div>
                    </div>

                    <div class="card border-0 w-100 box__shadow">
                        <div class="position-relative">
                            <img src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg"
                                class="card-img-top img-auth-team" alt="Nguyễn Tấn Duy">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round"
                                    href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="card-body mt-4 p-3">
                            <h4 class="card-title fw-bold text-center">Nguyễn Văn B</h4>
                            <p class="text-center">
                                CEO
                            </p>
                        </div>
                    </div>

                    <div class="card border-0 w-100 box__shadow">
                        <div class="position-relative">
                            <img src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg"
                                class="card-img-top img-auth-team" alt="Nguyễn Tấn Duy">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round"
                                    href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="card-body mt-4 p-3">
                            <h4 class="card-title fw-bold text-center">Nguyễn Văn C</h4>
                            <p class="text-center">
                                CEO
                            </p>
                        </div>
                    </div>

                    <div class="card border-0 w-100 box__shadow">
                        <div class="position-relative">
                            <img src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg"
                                class="card-img-top img-auth-team" alt="Nguyễn Tấn Duy">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round"
                                    href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square icon-about-team bg-white box__shadow-round" href=""
                                    target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="card-body mt-4 p-3">
                            <h4 class="card-title fw-bold text-center">Nguyễn Văn D</h4>
                            <p class="text-center">
                                CEO
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Start Content Area -->
@endsection