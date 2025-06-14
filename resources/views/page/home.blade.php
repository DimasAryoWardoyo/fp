@extends('layouts.app')
@section('title', 'Karang Taruna Klaten Asyik')

@section('content')
    <!-- Page Content -->
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($banners as $key => $banner)
                                    <li data-target="#storeCarousel" data-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner" style="max-height: 400px; border-radius: 15px;">
                                @foreach ($banners as $key => $banner)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $banner->gambar) }}"
                                            alt="Banner {{ $key + 1 }}" class="d-block w-100"
                                            style="object-fit: cover; height: 400px; border-radius: 15px;">
                                    </div>
                                @endforeach
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
                    @forelse ($kategoris as $kategori)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up"
                            data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ route('kategori.show', $kategori->id) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ asset('storage/' . $kategori->gambar_kategori) }}"
                                        alt="{{ $kategori->nama }}" class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $kategori->nama_kategori }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Tidak ada kategori yang tersedia.</p>
                        </div>
                    @endforelse
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
                    @php $incrementKonten = 0 @endphp
                    @forelse ($kontens as $konten)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up"
                            data-aos-delay="{{ $incrementKonten += 100 }}">
                            <a href="{{ route('konten.show', $konten->id) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="
                                    @if ($konten->gambar1) background-image: url('{{ asset('storage/' . $konten->gambar1) }}');
                                    @else
                                        background-color: #eee; @endif
                                    background-size: cover;
                                    background-position: center;
                                    height: 200px;
                                    border-radius: 8px;
                                ">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ \Illuminate\Support\Str::limit($konten->nama_konten, 50) }}
                                </div>
                                <div class="products-price">
                                    {{ \Carbon\Carbon::parse($konten->tanggal_konten)->format('d F Y') }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            <p class="text-muted">Tidak ada konten yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>


        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Kegiatan Yang Akan Dilaksanakan</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementEvent = 0 @endphp
                    @forelse ($events as $event)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up"
                            data-aos-delay="{{ $incrementEvent += 100 }}">
                            <a href="{{ route('agenda.show', $event->id) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="
                                    @if ($event->foto) background-image: url('{{ asset('storage/' . $event->foto) }}');
                                    @else
                                        background-color: #eee; @endif
                                    background-size: cover;
                                    background-position: center;
                                    height: 200px;
                                    border-radius: 8px;
                                ">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ \Illuminate\Support\Str::limit($event->nama_agenda, 50) }}
                                </div>
                                <div class="products-price">
                                    {{ \Carbon\Carbon::parse($event->waktu_mulai)->format('d F Y') }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            <p class="text-muted">Belum ada kegiatan yang akan datang.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

    </div>
@endsection
