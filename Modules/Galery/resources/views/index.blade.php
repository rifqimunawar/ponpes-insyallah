@extends('galery::layout.master')
@section('module-content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Gallery</a></li>
        {{-- <li class="breadcrumb-item active">Gallery Kita</li> --}}
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Galery Kita <small>{{ $userLogin->name }}</small></h1>

    <!-- BEGIN gallery-v2 -->
    <div class="gallery-v2" id="gallery">
        <div id="gallery" class="d-flex">
            @foreach ($data as $item)
                <a href="{{ asset('/assets/img/gallery/' . $item->img) }}" class="gallery-item m-2"
                    data-pswp-src="{{ asset('/assets/img/gallery/' . $item->img) }}">
                    <div class="thumbnail">
                        <img src="{{ asset('/assets/img/gallery/' . $item->img) }}" alt="Thumbnail"
                            style="width: 150px; height: 120px; object-fit:cover; border-radius:20px">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.gallery-item').forEach(function(link) {
            const img = link.querySelector('img');
            const src = img.src;

            // Create a new Image object to get dimensions
            const tempImg = new Image();
            tempImg.src = src;
            tempImg.onload = function() {
                // Set data-pswp-width and data-pswp-height attributes
                link.setAttribute('data-pswp-width', tempImg.width);
                link.setAttribute('data-pswp-height', tempImg.height);
            };
        });
    });
</script>
