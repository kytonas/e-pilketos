<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{url('/')}}" class="logo">
             <h1 class="text-white">E-Pilketos</h1>
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
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="{{route('voter')}}">
                <i class="fas fa-home"></i>
                <p>Beranda</p>
              </a>
            </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#charts">
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>