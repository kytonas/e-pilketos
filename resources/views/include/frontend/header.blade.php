<div class="header container-fluid bg-white">
    <div id="menu-jk" class="nav-col text-white shadow-md mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-2 pb-2 align-items-center">
                    <a href="{{ url('/') }}" class="logo">
                        <h1 class="text-black">E-Pilketos</h1>
                    </a>
                </div>
                <div id="menu" class="col-lg-6 d-none d-lg-block">
                    <ul class="float-end mul d-inline-block">
                        <li class="float-md-start px-4 pe-1 py-3">
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('pemilih.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
