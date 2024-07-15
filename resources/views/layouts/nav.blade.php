<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand english text-white" href="/">
                <img src="{{assetsLink("images/lego.png")}}" class="rounded" width="30" height="30"  alt="shopping_icon" />
                <span class="ml-3">LEGO</span>
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active english text-white" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link english text-white" href="/admin">Admin Pannel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link english text-white" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown bg-dark">
                        <a class="nav-link dropdown-toggle english text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(\App\classes\Auth::check())
                                {{\App\classes\Auth::user()->name}}
                            @else
                                Guest
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if(\App\classes\Auth::check())
                                <li><a class="dropdown-item" href="/user/logout">Logout</a></li>
                            @else
                                <li><a class="dropdown-item" href="/user/login">Login</a></li>
                                <li><a class="dropdown-item" href="/user/register">Register</a></li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>