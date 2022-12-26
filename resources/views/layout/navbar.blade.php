<nav class="navbar navbar-expand-lg bg-light mb-5">
    <div class="container-fluid container-lg">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Barbatos Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </li>
                {{-- @php
                    dd(Auth::user());
                @endphp --}}
                @guest()
                @else
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item w-100">
                            <a class="nav-link" href="/manage">Manage Product</a>
                        </li>
                    @endif
                @endguest
                <div class="d-lg-flex w-100 justify-content-end">
                    @guest()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('registration') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown d-flex">
                            @if (Auth::user()->role == 'user')
                                <div class="shopping-cart d-flex align-items-center">
                                    <a href="{{ url('cart') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            @endif
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                                @if (Auth::user()->role == 'user')
                                    <li><a class="dropdown-item" href="{{ url('history') }}">History</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endguest
                </div>
            </ul>
        </div>
    </div>
</nav>
