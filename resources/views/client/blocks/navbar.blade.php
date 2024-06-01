<header class="navbar">
    <a href="{{ route('home') }}"
    ><img
            class="logo-fpt"
            src="{{ asset('assets/img/LogoEduZone.png') }}"
            alt="fpt education logo"
        /></a>

    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('subject.index') }}">Subject</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fas fa-user fa-lg" style="color: rgb(255, 254, 254);"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if(!empty(Auth::user()))
                        <a class="dropdown-item" href="#">Name: {{ Auth::user()->name }}</a>

                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        @endif

                        <a class="dropdown-item" href="#">ID: StuID</a>
                        <a class="dropdown-item" href="#">Class: StuClass</a>
                        <a class="dropdown-item" href="/setting/settingstudent.html">Settings <i class="fas fa-cog"></i></a>
                        <a class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           href="{{ route('logout') }}">Log Out <i class="fas fa-sign-out-alt"></i></a>
                    @else
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endif

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>
</header>
