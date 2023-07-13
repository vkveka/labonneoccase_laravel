<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Trouvez et vendez des véhicules d'occasion de qualité sur notre plateforme d'achat-revente. Large sélection de voitures à des prix compétitifs.">
    <meta name="keywords"
        content="achat-revente véhicules, voitures d'occasion, vente de voitures, acheter voiture occasion, plateforme achat véhicules, réparation voiture, garage véhicules d'occasion, ma voiture ne démarre plus, comment redémarrer ma voiture">
    <title>Achat et vente de véhicules d'occasion toutes marques | La Bonne Occase</title>
    <link rel="icon" href="{{ asset('./images/Fintosgarage_final.ico') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Ajout polices -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Foldit&family=Raleway&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="app">
        @unless (request()->is('Rhlmcabr0n') || request()->is('login') || request()->is('register'))
            <header class="img_header">
                <img src="{{ asset('./images/new_banner_lbo.png') }}" alt="">
            </header>

            <nav class="navbar navbar-expand-md navbar-dark text-light sticky-top" style="z-index: 9999">
                <div class="container">
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="#dispo">Véhicules disponibles à la vente</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#sold">Véhicules vendus</a></li>
                            <li class="nav-item"><a class="nav-link" href="#my_contact">Contact</a></li>
                        </ul>



                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">
                            @guest
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->pseudo }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('Rhlmcabr0n') }}">Back-Office</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Deconnexion') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endunless


        @if (request()->is('Rhlmcabr0n'))
            <nav id="nav_admin" class="navbar navbar-expand-md navbar-light sticky-top" style="z-index: 9999">
                <div class="container-fluid">
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <h1 style="font-family: Foldit, cursive; margin: 0">La Bonne Occase</h1>
                        <img src="{{ asset('./images/Fintosgarage_final.png') }}" alt="" style="width: 2.4em;"
                            class="ms-3">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="#catalogueAdd"
                                    onclick="showProducts('catalogueAdd')" style="cursor:pointer">Ajouter une
                                    annonce</a></li>
                            <li class="nav-item"><a class="nav-link" href="#catalogueDispo"
                                    onclick="showProducts('catalogueDispo')" style="cursor:pointer">Catalogue à
                                    vendre</a></li>
                            <li class="nav-item"><a class="nav-link" href="#catalogueSold"
                                    onclick="showProducts('catalogueSold')" style="cursor:pointer">Catalogue
                                    vendues</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav" id="admin-nav">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->pseudo }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Deconnexion') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <main @if (!request()->is('login') || !request()->is('register')) id="home_main" @endif>
            <div class="container-fluid text-center alert_div">
                @if (session()->has('message'))
                    <p class="alert alert-success" id="successMessage">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" id="errorMessage">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>

    @unless (request()->is('login') || request()->is('register'))
        <footer id="my_contact" class="bg-dark pb-0">
            <div class="row m-0 text-center d-flex align-items-center justify-content-around p-5 pb-0">
                <div id="title_footer_lbo" class="mb-lg-0 mb-md-5 mb-0">
                    <h1>La Bonne Occase</h1>
                </div>
                <div class="col-md-3 col-6 mx-auto my-sm-5 mt-0 mb-5" style="border-top: 2px solid white"></div>
                <div class="col-lg-3 col-md-6 mx-auto mb-lg-0 m-1">
                    <img src="{{ asset('./images/Fintosgarage_footer.png') }}" alt="logo_png" id="logo_footer">
                </div>
                <div class="col-md-3 col-6 mx-auto my-5" style="border-top: 2px solid white"></div>


                @unless (request()->is('Rhlmcabr0n'))
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mx-auto link_footer mb-lg-0 my-md-5 my-0 d-flex justify-content-around">
                            <a href="https://www.instagram.com/labonneoccase_/" target="_blank"><img
                                    src="{{ asset('./images/icons/instagram_style.png') }}" alt="logo instagram"></a>
                            <a href="https://www.facebook.com/La-Bonne-Occase-105461735412444" target="_blank"><img
                                    src="{{ asset('./images/icons/facebook_style.png') }}" alt="logo facebook"></a>
                            <a href="https://wa.me/33677585149" target="_blank"><img
                                    src="{{ asset('./images/icons/whatsapp_style.png') }}" alt="logo whatsapp"></a>
                            <a href="mailto:la-bonne-occase@outlook.fr?subject=&amp;body="><img
                                    src="{{ asset('./images/icons/mail_style.png') }}" alt="logo mail"></a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-8 menu_footer mx-auto">
                            <div class="col-md-3 mb-sm-0 mb-2">
                                <a class="link_footer" href="#dispo">Disponibles</a>
                            </div>
                            <div class="col-md-3 mb-sm-0 mb-2">
                                <a class="link_footer" href="#sold">Vendus</a>
                            </div>
                            <div class="col-md-3">
                                <a class="link_footer" href="#my_contact">Contact</a>
                            </div>
                        </div>
                    </div>
                @endunless

                @unless (request()->is('Rhlmcabr0n'))
                    <div class="col-lg-12 mt-5 mx-auto">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21509.746023057825!2d-0.8243507973616158!3d47.631607788564644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48088fb80cfca199%3A0xb82737c0f04b18e6!2sGen%C3%A9%2C%2049220%20Erdre-en-Anjou!5e0!3m2!1sfr!2sfr!4v1675550447339!5m2!1sfr!2sfr"
                            width="75%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @endunless
            </div>
            <div class="row m-0 p-0 mt-5" style="background-color: black;">
                <div class="text-center">
                    <i class="fa-regular fa-copyright text-light" id="copyright_ico"> 2023 &copy; <a class="text-light"
                            style="text-decoration: none;" href="#">la-bonne-occase.com</a></i>
                </div>
            </div>

        </footer>
    @endunless
</body>

</html>
