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
                                    <img src="{{ url('/images/banner/banner1.jpg') }}" alt="Carousel Image"
                                        class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('/images/banner/banner2.jpg') }}" alt="Carousel Image"
                                        class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('/images/banner/banner3.jpg') }}" alt="Carousel Image"
                                        class="d-block w-100">
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
                    @foreach ($kategoris as $kategori)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ route('kategori.show', $kategori->id) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ asset('storage/' . $kategori->gambar_kategori) }}" alt="{{ $kategori->nama }}"
                                        class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $kategori->nama_kategori }}
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Konten Terbaru</h5>
                    </div>
                </div>
                <div class="row">
                    @foreach ($kontens as $konten)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration }}00">
                            <a href="{{ route('konten.show', $konten->id) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="background-image: url('{{ asset('storage/' . $konten->gambar1) }}');">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ Str::limit($konten->nama_konten, 50) }}
                                </div>
                                <div class="products-price">
                                    {{ $konten->tanggal_konten }}
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
@endsection