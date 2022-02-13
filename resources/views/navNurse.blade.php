<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h2><a href="#" class="logo">Kwano Health Center</a></h2>
    <hr>
    <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="/nurse/{{ Auth::user()->id }}" aria-expanded="false">
            <i class="bi bi-house-door-fill"></i>
                Home
            </a>
        </li>
        <hr>
        <li>
            <a href="#subSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="bi bi-signpost-split"></i>
                Suburbs
            </a>
            <ul class="collapse list-unstyled" id="subSubmenu">
                <li>
                    <a href="/nurse/{{ Auth::user()->id }}/suburb">
                        <i class="bi bi-geo-alt-fill"></i>
                        My Test
                    </a>
                </li>
                <li>
                    <a href="/nurse/{{ Auth::user()->id }}/favourites">
                        <i class="bi bi-list-stars"></i>
                        Favourites
                    </a>
                </li>
            </ul>
        </li>
        <hr>
        <li>
            <a href="#testSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-flask" aria-hidden="true"></i>
                Schedule
            </a>
            <ul class="collapse list-unstyled" id="testSubmenu">
                <li>
                    <a href="/nurse/{{ Auth::user()->id }}/bookings">New Test Requests</a>
                </li>
                <li>
                    <a href="/nurse/{{ Auth::user()->id }}/bookings/show">Test Schedule</a>
                </li>
            </ul>

        </li>

    </>
</div>

<nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: red">
    <span class="navbar-toggler-icon btn-danger" onclick="openNav()"></span>

    <div class="container">
        <div><img src="/images/logoblack.png" style="height: 35px" class="pr-2" ></div>
        <div class="pl-2">Kwano Health Center</div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto navbar-dark">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ $name }} {{ $surname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

