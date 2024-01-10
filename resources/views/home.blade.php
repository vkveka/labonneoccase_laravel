@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            </div>
        </div>
    </div> --}}



    <section class="main_section">
        <!-- Section bloc d'informations : ACHAT & VENTE -->
        <div class="row m-0 p-0 justify-content-center bloc_achat_vente text-center" id="bloc_achat_vente_other">
            <h1><b>VENTE DE VEHICULES TOUTES MARQUES</b></h1>
            <h4>Tous nos véhicules sont vendus révisés avec un contrôle technique de moins de 6 mois et garantis.</h4>
            <div class="col-8 mt-4 mb-5" style="border-top: 2px solid white"></div>
            <h4>N'hésitez pas à nous contacter par mail ou par téléphone :</h4>
            <div class="row d-flex justify-content-center mt-2">
                <h4 class="contact_header">la-bonne-occase@outlook.fr</h4>
            </div>
            <div class="row d-flex justify-content-center">
                <h4 class="contact_header m-0">+33 6 77 58 51 49</h4>
            </div>
            <div class="col-md-3 col-6 mx-auto my-5" style="border-top: 2px solid white"></div>
        </div>

        <!-- Affiche les voitures disponibles à la vente -->
        <section id="dispo">
            <div class="col-md-6 mx-auto text-center title_dispo">
                <h1>Véhicules disponibles à la vente</h1>
            </div>
            <div class="col-lg-11 mx-auto">
                <div class="row m-0 p-0 justify-content-center">
                    @if (count($annoncesToSell) == 0)
                        <div class="col-md-5 col-sm-10 col-10 mx-auto nocars-index text-center">
                            <h3 class="my-auto">De nouveaux véhicules seront bientôt disponibles !</h3>
                        </div>
                    @endif
                    @foreach ($annoncesToSell as $annonce)
                        <div class="col-xl-3 col-lg-5 col-sm-6 col-11 m-5 card-index-forsell">
                            <div class="all_in {{ $annonce->status == 0 ? 'all_in_dispo' : 'all_in_soon' }}"
                                style="position: relative; display: inline-block;">
                                @if ($annonce->status == 0)
                                    <span style="position: absolute" class="price">{{ $annonce->price }} €</span>
                                @else
                                    <span style="position: absolute" class="dispo_soon">{{ 'Bientôt disponible !' }}</span>
                                @endif
                                <div class="col-12 img_for_sell">
                                    <img class="{{ $annonce->status == 2 ? 'brightness_soon' : '' }}"
                                        src="{{ asset("./images/annonces/$annonce->picture") }}"
                                        alt="voitures d'occasion à vendre" style="width: 100%;">
                                </div>
                                <div class="col-12 title_car text-center"><b>{{ $annonce->title }}</b></div>
                                <div class="col-12 text-center text-dark parent_info_selling">
                                    <div class="col-4 info_selling">
                                        <img class="mx-auto" src="{{ asset('./images/icons/year.png') }}"
                                            alt="icon-voiture-à-vendre">
                                        <div class="row">
                                            <p>{{ $annonce->year }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4 info_selling">
                                        <img class="mx-auto" src="{{ asset('./images/icons/km.png') }}"
                                            alt="icon-voiture-à-vendre">
                                        <div class="row">
                                            <p>{{ $annonce->km }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4 info_selling">
                                        <img class="mx-auto" src="{{ asset('./images/icons/fuel.png') }}"
                                            alt="icon-voiture-à-vendre">
                                        <div class="row">
                                            <p>{{ $annonce->fuel }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($annonce->status == 2)
                                <div class="link_lbc col-lg-10 col-sm-10 col-6 text-center mx-auto">
                                    <a class="btn">Annonce indisponible</a>
                                </div>
                            @else
                                <div class="link_lbc col-lg-10 col-sm-10 col-6 text-center mx-auto">
                                    <a class="btn" target="_blank" href="{{ $annonce->description }}">Voir l'annonce</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="col-8 mx-auto the_line" style="border-top: 2px solid white"></div>

        <section id="sold">
            <div class="col-xl-6 col-lg-8 col-md-10 bg-carousel mx-auto">
                <div class="mb-5 mx-auto text-center title_dispo">
                    <h1>Véhicules vendus récemment</h1>
                </div>
                <div class="row m-0 p-0 justify-content-around">
                    <!-- Affiche le carousel des voitures vendues -->
                    <div class="col-md-6 col-sm-8 col-11 mx-auto" style="display: flex; justify-content: center;">
                        <div id="carousel_sold" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner center-block">

                                @foreach ($annoncesSold as $key => $annonce)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="4000">
                                        <div class="all_in" style="position: relative; display: inline-block;">
                                            {{-- <span style="position: absolute" class="price">{{ $annonce->price }} €</span> --}}
                                            <img src="{{ asset("./images/annonces/$annonce->picture") }}"
                                                alt="voiture d'occasion vendue">
                                            <div class="col-12 title_car text-center"><b>{{ $annonce->title }}</b>
                                            </div>
                                            <div class="col-12 text-center parent_info_selling">
                                                <div class="col-4 info_selling">
                                                    <img class="mx-auto" src="{{ asset('./images/icons/year.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                    <div class="row">
                                                        <p>{{ $annonce->year }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 info_selling">
                                                    <img class="mx-auto" src="{{ asset('./images/icons/km.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                    <div class="row">
                                                        <p>{{ $annonce->km }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 info_selling">
                                                    <img class="mx-auto" src="{{ asset('./images/icons/fuel.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                    <div class="row">
                                                        <p>{{ $annonce->fuel }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel_sold"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel_sold"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>



                    {{-- CAROUSEL SOLD DESC --}}
                    <!-- Affiche le carousel des voitures vendues -->
                    <div class="col-md-6 col-sm-8 col-11 mx-auto" style="display: flex; justify-content: center;">
                        <div id="carousel_sold_desc" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner center-block">

                                @foreach ($annoncesSoldDesc as $key => $annonce)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="4000">
                                        <div class="all_in" style="position: relative; display: inline-block;">
                                            {{-- <span style="position: absolute" class="price">{{ $annonce->price }} €</span> --}}
                                            <img src="{{ asset("./images/annonces/$annonce->picture") }}"
                                                alt="voiture d'occasion vendue">
                                            <div class="col-12 title_car text-center"><b>{{ $annonce->title }}</b>
                                            </div>
                                            <div class="col-12 text-center parent_info_selling">
                                                <div class="col-4 info_selling">
                                                    <img class="mx-auto" src="{{ asset('./images/icons/year.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                    <div class="row">
                                                        <p>{{ $annonce->year }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 info_selling">
                                                    <img class="mx-auto" src="{{ asset('./images/icons/km.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                    <div class="row">
                                                        <p>{{ $annonce->km }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 info_selling">
                                                    <img class="mx-auto" src="{{ asset('./images/icons/fuel.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                    <div class="row">
                                                        <p>{{ $annonce->fuel }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel_sold_desc"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel_sold_desc"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
