<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container ">
        <div class="col-lg-2 col-md-2 col-6">
            <div class="logo">
                <a href="">
                    <h4><img src={{ asset('images/Logo.png') }} style="width: 70%;">
                    </h4>
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            @auth
                @if (Auth::user())
                    <div class="text-right mr-2">
                        <span class="text-primary  font-weight-bold small">Welcome</span><br>
                        <span class=" small">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span>
                    </div>
                    <li class="nav-item dropdown" style="list-style-type:none">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (auth()->user()->image)
                                <img class="img-profile rounded-circle mr-2" src="{{ auth()->user()->image }}"
                                    style="width: 3rem">
                            @else
                                <img class="img-profile rounded-circle mr-2"
                                    src="{{ asset('/images/UserThumbnail.png') }}" style="width: 3rem">

                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                ออกจากระบบ
                            </a>
                        </div>
                    </li>
                @endif

            @else
                <li style="list-style-type:none"><i class="ti-power-off"></i><a href="{{ route('login') }}">เข้าสู่ระบบ
                        /</a>
                    <a href="{{ route('register') }}">สมัครสมาชิก</a>
                </li>
            @endauth
        </div>
    </div>

</nav>
