@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                                <li data-target="#storeCarousel" data-slide-to="2"></li>
                            </ol>
                            <div style="max-height: 400px; border-radius: 15px;" class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ url('/images/banner/banner1.jpg') }}" alt="Carousel Image" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('/images/banner/banner2.jpg') }}" alt="Carousel Image" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('/images/banner/banner3.jpg') }}" alt="Carousel Image" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/categories/decal.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Decal
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/categories/printing.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Printing
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/categories/stripting.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Striping
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/categories/cutting.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Cutting
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Products</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/1.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/2.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2021 2022
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/3.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                50 Pcs Sticker Random Aesthetic Qnti Air Untuk Laptop Case Tumbler Koper Hp DLL.
                            </div>
                            <div class="products-price">
                                Rp 12.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/4.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                108 PCS STICKER RANDOM AESTHETIC ANTI AIR UNTUK LAPTOP CASE TUMBLER KOPER HP
                            </div>
                            <div class="products-price">
                                Rp 25.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/5.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Ready Stiker Sponsor Racing.
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/6.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/7.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/8.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="900">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/9.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/1.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/1.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('/images/products/1.jpg');">
                                </div>
                            </div>
                            <div class="products-text">
                                Stiker Striping Lis Decal Honda Crf 150L Original Standart 2018 2019 2020 2021
                            </div>
                            <div class="products-price">
                                Rp 70.000
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection