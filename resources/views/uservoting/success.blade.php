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

<body class="d-flex flex-column min-vh-100">
    @include('include.frontend.header')

    <div class="container-xl big-padding flex-grow-1">
        <div class="welcome text-center mt-5">
            <div class="col mb-5">
                <h1>Terima Kasih telah Berpartisipasi</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Tenetur corporis magni nesciunt recusandae maiores culpa repellendus ex
                    id provident. Numquam aliquam quae commodi iste ut dolorum velit pariatur
                    atque praesentium!
                </p>
            </div>
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
