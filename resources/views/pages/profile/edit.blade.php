@extends('layouts.default')

@section('title', 'Profile')

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-autofill-bs5/css/autoFill.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('/assets/plugins/datatables.net/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-autofill/js/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-autofill-bs5/js/autoFill.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-colreorder-bs5/js/colReorder.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-rowreorder-bs5/js/rowReorder.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('/assets/js/demo/table-manage-combine.demo.js') }}"></script>
    <script src="{{ asset('/assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
    <script src="{{ asset('/assets/js/demo/render.highlight.js') }}"></script>
    <script src="{{ asset('/assets/plugins/ionicons/dist/ionicons/ionicons.js') }}"></script>
@endpush

@section('content')
    <!-- BEGIN profile -->
    <div class="profile">
        <div class="profile-header">
            <!-- BEGIN profile-header-cover -->
            <div class="profile-header-cover"></div>
            <!-- END profile-header-cover -->
            <!-- BEGIN profile-header-content -->
            <div class="profile-header-content">
                <!-- BEGIN profile-header-img -->
                <div class="profile-header-img">
                    <img src="{{ asset('/assets/img/user/' . $userLogin->avatar) }}" alt="" />
                </div>
                <!-- END profile-header-img -->
                <!-- BEGIN profile-header-info -->
                <div class="profile-header-info">
                    <h4 class="mt-0 mb-1">{{ $userLogin->name }}</h4>
                    <p class="mb-2">UXUI + Frontend Developer</p>
                    <a href="#" class="btn btn-xs btn-yellow">Edit Profile</a>
                </div>
                <!-- END profile-header-info -->
            </div>
            <!-- END profile-header-content -->
            <!-- BEGIN profile-header-tab -->
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile-avatar" class="nav-link active" data-bs-toggle="tab">PROFILE</a></li>
                <li class="nav-item"><a href="#profile-photos" class="nav-link" data-bs-toggle="tab">GALERY</a></li>
            </ul>
            <!-- END profile-header-tab -->
        </div>
    </div>
    <!-- END profile -->
    <!-- BEGIN profile-content -->
    <div class="profile-content">
        <!-- BEGIN tab-content -->
        <div class="tab-content p-0">
            <!-- PROFILE Avatar Tab -->
            <div class="container col-md-6 tab-pane fade show active" id="profile-avatar">
                <div class="mb-5">
                    <form action="{{ route('profile.foto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="Image" class="form-label">Upload foto profile baru</label>
                        <input class="form-control" required type="file" name="avatar" id="formFile"
                            onchange="preview()">
                        <button type="button" onclick="clearImage()" class="btn btn-warning mt-3">Hapus</button>
                        <button type="submit" class="btn btn-info mt-3">Simpan</button>
                    </form>
                </div>
                <img id="frameProfile" src="" class="img-fluid" />
            </div>

            <!-- PROFILE Photos Tab -->
            <div class="container col-md-6 tab-pane fade" id="profile-photos">
                <div class="mb-5">
                    <form action="{{ route('galery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="ImageGalery" class="form-label">Upload foto untuk galery</label>
                        <input class="form-control" required type="file" name="img" id="formFileGalery"
                            onchange="previewGalery()">
                        <button type="button" onclick="clearImageGalery()" class="btn btn-warning mt-3">Hapus</button>
                        <button type="submit" class="btn btn-info mt-3">Simpan</button>
                    </form>
                </div>
                <img id="frameGalery" src="" class="img-fluid" />
            </div>
        </div>
        <!-- END profile-content -->
    @endsection
    <script>
        function preview() {
            const frame = document.getElementById('frameProfile');
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('formFile').value = null;
            const frame = document.getElementById('frameProfile');
            frame.src = "";
        }

        // ==========================================for galery
        function previewGalery() {
            const frame = document.getElementById('frameGalery');
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImageGalery() {
            document.getElementById('formFileGalery').value = null;
            const frame = document.getElementById('frameGalery');
            frame.src = "";
        }
    </script>
