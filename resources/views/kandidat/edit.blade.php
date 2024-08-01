<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Ubah Data Kandidat</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('backend/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('backend/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('include.backend.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="../index.html" class="logo">
                            <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('include.backend.header')
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Kandidat</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="{{ url('/admin') }}">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kandidat.index') }}">Kandidat</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Ubah data</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                 @if (session('success'))
                                            <div class="alert alert-success fade show" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                <div class="card-header">
                                    <div class="card-title">Detail data</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('kandidat.update', $kandidat->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_urut">No. Urut</label>
                                                    <input type="number" class="form-control" name="no_urut" 
                                                    value="{{$kandidat->no_urut}}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_ketua">Nama ketua</label>
                                                    <input type="text" class="form-control" name="nama_ketua" 
                                                    value="{{$kandidat->nama_ketua}}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_wakil">Nama wakil</label>
                                                    <input type="text" class="form-control" name="nama_wakil" 
                                                     value="{{$kandidat->nama_wakil}}" />
                                                </div>
                                                <div class="form-group">
                                                     <label for="kelas" class="form-label">Kelas</label>
                                                    <select id="kelas" name="kelas" class="form-select" required>
                                                        <option value="" disabled selected>{{$kandidat->kelas}}</option>
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="visi">Visi</label>
                                                    <textarea class="form-control" name="visi"  >
                                                        {{$kandidat->visi}}
                                                </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="misi">Misi</label>
                                                    <textarea class="form-control" name="misi" >
                                                        {{$kandidat->misi}}
                                                </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jurusan" class="form-label">Jurusan</label>
                                                    <select id="jurusan" name="jurusan" class="form-select" required>
                                                        <option value="" disabled selected>{{$kandidat->jurusan}}</option>
                                                        <option value="RPL">RPL</option>
                                                        <option value="TKRO">TKRO</option>
                                                        <option value="TBSM">TBSM</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                                    <input type="text" class="form-control" name="tahun_ajaran" 
                                                    value="{{$kandidat->tahun_ajaran}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Foto</label><br>
                                                    <input type="file" class="form-control" name="foto" 
                                                    value="{{$kandidat->foto}}"/><br>
                                                    <img src="{{ asset('/images/kandidat/' . $kandidat->foto) }}"
                                                         width="200px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Foto Wakil</label><br>
                                                    <input type="file" class="form-control" name="foto_wakil" 
                                                    value="{{$kandidat->foto_wakil}}"/><br>
                                                    <img src="{{ asset('/images/kandidat/wakil/' . $kandidat->foto_wakil) }}"
                                                         width="200px">
                                                </div>
                                                <div class="card-action">
                                                    <button class="btn btn-success" type="submit">Ubah</button>
                                                    <a href="{{ url('admin/kandidat') }}" class="btn btn-danger">Kembali</a>
                                                    <form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('include.backend.footer')
        </div>

        < </div>
            <!--   Core JS Files   -->
            <script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
            <script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
            <script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>

            <!-- jQuery Scrollbar -->
            <script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

            <!-- Chart JS -->
            <script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>

            <!-- jQuery Sparkline -->
            <script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

            <!-- Chart Circle -->
            <script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

            <!-- Datatables -->
            <script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>

            <!-- Bootstrap Notify -->
            <script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

            <!-- jQuery Vector Maps -->
            <script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
            <script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>

            <!-- Google Maps Plugin -->
            <script src="{{ asset('backend/assets/js/plugin/gmaps/gmaps.js') }}"></script>

            <!-- Sweet Alert -->
            <script src="{{ asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

            <!-- Kaiadmin JS -->
            <script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

            <!-- Kaiadmin DEMO methods, don't include it in your project! -->
            <script src="{{ asset('backend/assets/js/setting-demo2.js') }}"></script>
</body>

</html>
