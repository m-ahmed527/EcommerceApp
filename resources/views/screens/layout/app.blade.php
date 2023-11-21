<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EComm Practice</title>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @stack('style')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">E-Commerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('create.product') }}">Add Product</a>
                            </li>
                            <li class="nav-item dropdown">
                                {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> --}}
                                {{-- Dropdown
                    </a> --}}
                                <ul class="dropdown-menu">
                                    {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                                    {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('products') }}">My Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                            </li>
                        </ul>

                        <a class="btn btn-dark me-2" type="button"
                            onclick="document.getElementById('logout-form').submit()">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @else
                        <a class="btn me-2" href="{{ route('login') }}">Login</a>
                        <a class="btn me-2" href="{{ route('register') }}">Sign Up</a>
                    @endauth

                </div>
            </div>
        </nav>

    </header>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
