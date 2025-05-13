@extends('layouts.app')

@section('content')
    <div class="page-content page-home">
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    @foreach ($categories as $item)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <a href="{{ route('kategori.show', $item->id) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ asset('storage/' . $item->gambar_kategori) }}" alt="{{ $item->nama_kategori }}"
                                        class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $item->nama_kategori }}
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
                    @forelse ($kontens as $konten)
                        <div class="col-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up"
                            data-aos-delay="{{ $loop->iteration * 100 }}">
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
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up">
                            <p>Tidak ada konten dalam kategori ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection