<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $konten->nama_konten }}</title>

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>
<body>
    <div class="page-details mt-4">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url()->previous() }}" class="link-hover">
                                        Kembali
                                        </a>
                                    </li>
                                <li class="breadcrumb-item active">
                                    {{ $konten->nama_konten }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image" alt="">
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click.prevent="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mt-4">
                            <h1>{{ $konten->nama_konten }}</h1>
                            <div class="price">Tanggal: {{ $konten->tanggal_konten }}</div>
                            <div class="owner">Kategori: {{ $konten->kategori->nama_kategori }}</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <p>{!! nl2br(e($konten->deskripsi)) !!}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('includes.footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')

    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                    {
                        id: 1,
                        url: "{{ asset('storage/' . $konten->gambar1) }}",
                    },
                    {
                        id: 2,
                        url: "{{ asset('storage/' . $konten->gambar2) }}",
                    },
                    {
                        id: 3,
                        url: "{{ asset('storage/' . $konten->gambar3) }}",
                    },
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });
    </script>
</body>
</html>
