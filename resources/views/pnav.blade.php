<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="logo">Kwano Health Center</a>
    <hr>
    <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="/patient/{{Auth::user()->id}}" aria-expanded="false">
                <i class="bi bi-house-door-fill"></i>
                Home
            </a>
        </li><hr>
        <li>
            <a href="#citySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="bi bi-geo-alt-fill"></i>
                Address
            </a>
            <ul class="collapse list-unstyled" id="citySubmenu">
                <li>
                    <a href="/patient/{{ Auth::user()->id }}/address">Manage Address</a>
                </li>

            </ul>
        </li>
        <hr>
        <li>
            <a href="#dependSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="bi bi-diagram-3-fill"></i>
                Dependents
            </a>
            <ul class="collapse list-unstyled" id="dependSubmenu">
                <li>
                    <a href="/patient/{{ Auth::user()->id }}/dependents">Manage Dependents</a>
                </li>
            </ul>
        </li>
        <hr>
        <li>
            <a href="#fundSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="bi bi-credit-card"></i>
                Manage Profile
            </a>
            <ul class="collapse list-unstyled" id="fundSubmenu">
                <li>
                    <a href="/patient/{{ Auth::user()->id }}/profile">Update Profile</a>
                </li>
            </ul>
        </li>
        <hr>
        <li>
            <a href="#testSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-flask" aria-hidden="true"></i>
                Tests
            </a>
            <ul class="collapse list-unstyled" id="testSubmenu">
                <li>
                    <a href="/patient/{{ Auth::user()->id }}/request">Request Test</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="main">
<nav class="navbar navbar-dark navbar-expand-md shadow-sm" style="background-color: red">
    <span class="navbar-toggler-icon" onclick="openNav()"></span><strong style="color: black"></strong>

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
                            {{ $name }} {{$surname}} <span class="caret"></span>
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
</div>
