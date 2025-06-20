@extends('layouts.app')
@section('title', 'Trend Categories - Karang Taruna Klaten Asyik')

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
                                    <img src="{{ asset('storage/' . $item->gambar_kategori) }}"
                                        alt="{{ $item->nama_kategori }}" class="w-100">
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

        <section class="chefs section-bg mb-4">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h5>Konten Terbaru</h5>
                </div>
                <div class="row gy-4">
                    @php $incrementKonten = 0; @endphp
                    @forelse ($kontens as $konten)
                        <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="{{ $incrementKonten += 100 }}">
                            <div class="chef-member h-100 d-flex flex-column w-100">
                                <div class="member-img w-100" style="height: 200px; overflow: hidden; border-radius: 8px;">
                                    <img src="{{ asset('storage/' . $konten->gambar1) }}" alt="{{ $konten->nama_konten }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="member-info d-flex flex-column w-100 mt-3">
                                    <h4 class="text-truncate">
                                        {{ \Illuminate\Support\Str::limit($konten->nama_konten, 50) }}</h4>
                                    <p class="text-muted">
                                        {{ \Carbon\Carbon::parse($konten->tanggal_konten)->format('d F Y') }}</p>
                                    <a href="{{ route('konten.show', $konten->id) }}" class="mt-auto">Baca
                                        Selengkapnya...</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            <p class="text-muted">Tidak ada konten yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
