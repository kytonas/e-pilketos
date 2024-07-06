{{-- <form method="POST" action="{{ route('pemilih.login.submit') }}">
    @csrf
    <div>
        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form> --}}
<!-- Login 5 - Bootstrap Brain Component -->
<title>Login</title>
<link rel="icon" href="{{ asset('backend/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-5/assets/css/login-5.css">
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6 text-bg-primary">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
              <img class="img-fluid rounded mb-4" loading="lazy" src="{{asset('img/logo-custom__1_-removebg-preview.png')}}" width="245" height="80" alt="BootstrapBrain Logo">
              <hr class="border-primary-subtle mb-4">
              <h2 class="h1 mb-4">E-Pilketos</h2>
              <p class="lead m-0">Website Pemilihan Ketua OSIS</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Log in</h3>
                </div>
              </div>
            </div>
            <form action="{{route('pemilih.login.submit')}}" method="POST">
                @csrf
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="nis" class="form-label">NIS<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nis" id="nis" required>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" value="" required>
                </div>
                <div class="col-12">
                <label class="form-check-label text-secondary" for="remember_me">
                  <i>*data login diberikan oleh admin e-pilketos</i>
                </label>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit">Log in</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
