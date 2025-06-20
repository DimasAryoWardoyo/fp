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
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Breadcrumb kiri -->
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url()->previous() }}" class="link-hover">Kembali</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ $konten->nama_konten }}</li>
                                </ol>
                            </nav>

                            <!-- Logo kanan -->
                            <a href="{{ url('/') }}" class="navbar-brand">
                                <img src="{{ url('/images/lg.svg') }}" alt="Logo" style="height: 35px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery py-4" id="gallery">
            <div class="container">
                <div class="row">
                    <!-- Gambar utama -->
                    <div class="col-lg-8 mb-3" data-aos="zoom-in">
                        <div class="main-image-wrapper border rounded overflow-hidden position-relative"
                            style="height: 450px;">
                            <transition name="slide-fade" mode="out-in">
                                <img :src="photos[activePhoto].url" :key="photos[activePhoto].id"
                                    class="w-100 h-100 object-fit-cover position-absolute top-0 start-0"
                                    :alt="'Foto ' + activePhoto">
                            </transition>
                        </div>
                    </div>

                    <!-- Thumbnail -->
                    <div class="col-lg-3 d-flex flex-column align-items-start justify-content-center"
                        style="gap: 15px;">
                        <div v-for="(photo, index) in photos" :key="photo.id"
                            @click.prevent="changeActive(index)"
                            class="border rounded overflow-hidden thumbnail-wrapper"
                            :class="{ 'border-2 border-primary': index === activePhoto }"
                            style="height: 130px; width: 200px; cursor: pointer;">
                            <img :src="photo.url" class="w-100 h-100 object-fit-cover rounded"
                                :alt="'Thumbnail ' + index">
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
                photos: [{
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
