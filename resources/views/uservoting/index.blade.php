<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beranda</title>
    <link rel="icon" href="{{ asset('backend/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" />
</head>

<body>
    @include('include.frontend.header')

    <div class="container-xl big-padding">
        <div class="row section-title">
            <h2 class="fs-4">Selamat datang di E-Pilketos</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eleifend arcu et sem elementum faucibus.
                Vestibulum faucibus eleifend dolor, id luctus libero. Suspendisse commodo, orci eu mattis mattis, ante
                ligula porta tortor, ut scelerisque massa risus a quam.</p>
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
                                src="{{ asset('images/kandidat/wakil/' . $data->foto_wakil) }}" alt="Foto Wakil Ketua">
                        </div>
                        <h4 class="mt-3 fs-5 mb-1 fw-bold">{{ $data->no_urut }}</h4>
                        <h6 class="fs-7">Ketua :<span class="text-primary fw-bold">
                                {{ $data->nama_ketua }}</span></h6>
                        <h6 class="fs-7">Wakil Ketua :<span class="text-primary fw-bold">
                                {{ $data->nama_wakil }}</span></h6>
                        <p class="text-dark fs-8">Kelas : {{ $data->kelas }}</p>
                        <p class="text-dark fs-8">Jurusan : {{ $data->jurusan }}</p>
                        <p class="text-dark mb-3 fs-8">Tahun ajaran : {{ $data->tahun_ajaran }}</p>
                        <button data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-primary fw-bolder fs-8 view-manifesto">Visi & Misi</button>
                        @if ($pemilih->status == 0)
                            <form method="POST" action="{{ route('vote.store') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_pemilih" value="{{ $pemilih->id }}">
                                <input type="hidden" name="id_kandidat" value="{{ $data->id }}">
                                <button type="submit" class="btn btn-danger fw-bolder px-4 ms-2 fs-8"
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

        </div>
    </div>

    @include('include.frontend.footer')


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


</body>
<script src="{{ asset('frontend/assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/testimonial/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
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

</html>
