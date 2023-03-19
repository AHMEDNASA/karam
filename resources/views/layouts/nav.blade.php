
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/restaurant/public">Restaurants</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/register">Register</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/dashboard">Account</a>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>

{{-- @if (Auth::check())
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/restaurants">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menus">Menus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/items">Items</a>
                    </li>


                </ul>
                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/register">Register</a>
                            </li>
                        @endguest

                        @auth
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/dashboard">Account</a>
                        </li>
                            <li class="nav-item">
                                <form method="post" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>

                            </li>

                        @endauth


                    </ul>
                </div>
            </div>
        </div>
    </nav>
@endif --}}
