<nav class="navbar navbar-light bg-light justify-content-between">
    <div class="container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <h4><img src={{ asset('images/Logo.png') }} style="width: 70%;">
                </h4>
            </a>
        </div>
        <form class="form-inline">
            @auth
                @if (Auth::user())
                    <div class="text-right">
                        <span class="text-primary font-weight-bold small">Welcome</span><br>
                        <span class="small">{{ auth()->user()->firstname_th }}
                            {{ auth()->user()->lastname_th }}</span>
                    </div>
                    <li class="nav-item dropdown" style="list-style-type:none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (auth()->user()->image)
                                <img class="img-profile rounded-circle" src="{{ auth()->user()->image }}"
                                    style="width:2.9rem">
                            @else
                                <img class="img-profile rounded-circle" src="{{ asset('/images/UserThumbnail.png') }}"
                                    style="width: 2.9rem">

                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left:-60%;">
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
        </form>
    </div>
</nav>
