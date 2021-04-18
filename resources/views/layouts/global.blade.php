<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larashop | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('polished/polished.min.css') }}">
    <link rel="stylesheet" href="{{ asset('polished/iconic/css/open-iconic-bootstrap.min.css') }}">

    <style>
        .grid-highlight {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr {
            margin: 6rem 0;
        }

        hr+.display-3,
        hr+.display-2+.display-3 {
            margin-bottom: 2rem;
        }

    </style>
    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document
            .implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' :
            ' no-svg');

    </script>
</head>

<body>

    <nav class="navbar navbar-expand p-0">
        <a href="{{ route('home') }}" class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0"> Larashop </a>
        <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button">
            <span class="oi oi-menu"></span>
        </button>
        <input type="text" class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2"
            placeholder="Search" aria-label="Search">
        <div class="dropdown d-none d-md-block">
            @if (\Auth::user())
                <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown"
                    data-toggle="dropdown">
                    {{ Auth::user()->name }}
                </button>
            @endif
            <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Setting</a>
                <div class="dropdown-divider"></div>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" style="cursor: pointer">Logout</button>
                    </form>
                </li>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0 h-100">
        <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
            <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">
                <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
                    <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search"
                        aria-label="Search" />
                    <li>
                        <a href="{{ route('home') }}">
                            <span class="oi oi-home"></span>Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <span class="oi oi-people"></span>Manage Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}">
                            <span class="oi oi-tag"></span>Manage Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}">
                            <span class="oi oi-book"></span>Manage Books
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}">
                            <span class="oi oi-inbox"></span>Manage Orders
                        </a>
                    </li>
                </ul>
                <div class="pl-3 d-none d-md-block position-fixed" style="bottom: 0px">
                    <span class="oi oi-cog"></span> Setting
                </div>
            </div>
            <div class="col-lg-10 col-md-9 p-4">

                @yield('content')

            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/bootstrap-4.min.css') }}">

    @yield('footer-scripts')

</body>

</html>
