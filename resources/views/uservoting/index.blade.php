<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Beranda</title>
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
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('include.frontend.header')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="section">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/1.jpg') }}" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/sakola.jpg') }}" class="d-block w-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="container">
                    <div class="welcome text-center mt-5">
                        <div class="col mb-5">
                            <h1>Selamat datang di E-pilketos</h1>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h2>Daftar Kandidat Calon Ketua OSIS</h2>
                    </div>
                    <div class="row">
                        @foreach ($kandidat as $data)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="text-center votcard shadow-md bg-white p-4 pt-5 h-100">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="rounded-pill shadow-md p-2 me-3"
                                            src="{{ asset('images/kandidat/' . $data->foto) }}" alt="Foto Ketua">
                                        <img class="rounded-pill shadow-md p-2"
                                            src="{{ asset('images/kandidat/wakil/' . $data->foto_wakil) }}"
                                            alt="Foto Wakil Ketua">
                                    </div>
                                    <h4 class="mt-3 fs-5 mb-1 fw-bold">{{ $data->no_urut }}</h4>
                                    <h6 class="fs-7">Ketua :<span class="text-primary fw-bold">
                                            {{ $data->nama_ketua }}</span></h6>
                                    <h6 class="fs-7">Wakil Ketua :<span class="text-primary fw-bold">
                                            {{ $data->nama_wakil }}</span></h6>
                                    <p class="text-dark fs-8">Kelas : {{ $data->kelas }}</p>
                                    <p class="text-dark fs-8">Jurusan : {{ $data->jurusan }}</p>
                                    <p class="text-dark mb-3 fs-8">Tahun ajaran : {{ $data->tahun_ajaran }}</p>
                                    <button data-id="{{ $data->id }}" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        class="btn btn-primary fw-bolder fs-8 view-manifesto">Visi & Misi</button>
                                    @if ($pemilih->status == 0)
                                        <form method="POST" action="{{ route('vote.store') }}" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="id_pemilih" value="{{ $pemilih->id }}">
                                            <input type="hidden" name="id_kandidat" value="{{ $data->id }}">
                                            <button type="submit"
                                                class="btn btn-danger fw-bolder px-4 ms-2 fs-8"
                                                onclick="return confirm('Apakah anda yakin ingin memiilih kandidat ini ?')">
                                                Vote
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary fw-bolder px-4 ms-2 fs-8" disabled>Already
                                            Voted</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Perhitungan Sementara</div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('include.backend.footer')
        </div>
    </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-6 fw-bold fs-5" id="exampleModalLabel">Visi & Misi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="molist">
                        <h6>Visi</h6>
                        <li id="visi"></li>
                        <h6>Misi</h6>
                        <li id="misi"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>
    {{-- <script src="{{asset('backend/assets/js/plugin/chart.js/chart.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Suara (%)',
                    data: @json($hasil),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + "%"
                            }
                        }
                    }
                }
            }
        });
    </script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('backend/assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('.view-manifesto');
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    fetch('/get-manifesto/' + id)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('visi').innerText = data.visi;
                            document.getElementById('misi').innerText = data.misi;
                        });
                });
            });
        });
    </script>
</body>

</html>
