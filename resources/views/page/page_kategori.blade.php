@extends('layouts.app')
@section('title', 'Trend Categories - Karang Taruna Klaten Asyik')

@section('content')
    <div class="page-content page-home">

        {{-- KATEGORI --}}
        <section class="store-trend-categories">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    @foreach ($kategoris as $item)
                        <div class="col-6 col-md-3 col-lg-2 mb-3" data-aos="fade-up"
                            data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ route('kategori.show', $item->id) }}" class="component-categories d-block text-center">
                                <div class="categories-image mb-2">
                                    <img src="{{ asset('storage/' . $item->gambar_kategori) }}" alt="{{ $item->nama_kategori }}"
                                        class="w-100 rounded" style="height: 100px; object-fit: cover;">
                                </div>
                                <p class="categories-text mb-0 text-dark">
                                    {{ $item->nama_kategori }}
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- KONTEN --}}
        <section class="store-new-products mt-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Konten Terbaru</h5>
                    </div>
                </div>
                <div class="row">
                    @forelse ($kontens as $konten)
                        <div class="col-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up"
                            data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ route('konten.show', $konten->id) }}"
                                class="component-products d-block text-decoration-none">
                                <div class="products-thumbnail mb-2">
                                    <div class="products-image rounded"
                                        style="background-image: url('{{ asset('storage/' . $konten->gambar1) }}'); height: 180px; background-size: cover; background-position: center;">
                                    </div>
                                </div>
                                <div class="products-text fw-bold text-dark">
                                    {{ Str::limit($konten->nama_konten, 50) }}
                                </div>
                                <div class="products-price text-muted">
                                    {{ $konten->tanggal_konten }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up">
                            <p>Tidak ada konten untuk ditampilkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection