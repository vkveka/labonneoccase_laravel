@extends('layouts.app')

@if (Auth::user())
    @section('content')
        <main id="catalogues">
            <section id="catalogueAdd" class="catalogue-section">
                <div class="col-md-6 mx-auto text-center title_dispo">
                    <h1>Ajouter une annonce</h1>
                </div>
                <div class="col-lg-11 mx-auto">
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10 col-12 m-sm-5 m-1 card-index-plus">
                            <form action="{{ route('annonces.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6 my-sm-auto mb-3">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile01" name="picture"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 parent_info_selling">
                                        <div class="row info_selling">
                                            <div class="col-2 my-auto">
                                                <img class="" src="{{ asset('./images/icons/year.png') }}"
                                                    alt="icon-voiture-à-vendre">
                                            </div>
                                            <div class="col-sm-9 col-10">
                                                <input type="number" class="form-control" id="year" name="year"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row info_selling">
                                            <div class="col-2 my-auto">
                                                <img class="" src="{{ asset('./images/icons/km.png') }}"
                                                    alt="icon-voiture-à-vendre">
                                            </div>
                                            <div class="col-sm-9 col-10">
                                                <input type="number" class="form-control" id="km" name="km"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row info_selling">
                                            <div class="col-2 my-auto">
                                                <img class="" src="{{ asset('./images/icons/fuel.png') }}"
                                                    alt="icon-voiture-à-vendre">
                                            </div>
                                            <div class="col-sm-9 col-10">
                                                <select class="form-control" id="fuel" name="fuel" required>
                                                    <option value="essence">Essence</option>
                                                    <option value="diesel">Diesel</option>
                                                    <option value="ethanol">Ethanol</option>
                                                    <option value="GPL">GPL</option>
                                                    <option value="electrique">Electrique</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row title_car">
                                    <div class="col-6">
                                        <label for="title" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="status" class="form-label">Statut</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="0" selected>À vendre</option>
                                            <option value="1">Vendu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 title_car">
                                    <label for="title" class="form-label">Lien LBC</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="link_lbc mt-4 col-lg-10 col-sm-10 col-6 text-center mx-auto">
                                    <button type="submit" class="btn btn-light">Ajouter l'annonce</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>




            <!-- Affiche les voitures disponibles à la vente -->
            <section id="catalogueDispo" class="catalogue-section" style="display: none; opacity: 0">
                <div class="col-md-6 mx-auto text-center title_dispo">
                    <h1>Catalogues des véhicules en vente</h1>
                </div>
                <div class="col-lg-11 mx-auto">
                    <div class="row m-0 p-0 justify-content-center">
                        @foreach ($annoncesToSell as $annonce)
                            <div class="col-xl-3 col-md-5 col-sm-7 col-12 m-sm-4 m-1 my-3 card-index-forsell">
                                <form action="{{ route('annonces.update', $annonce) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-6 mx-auto">
                                            <div class="change_status_icon" style="position: relative">
                                                <img src="{{ asset("./images/annonces/$annonce->picture") }}"
                                                    id="old{{ $annonce->id }}" alt="voitures d'occasion à vendre"
                                                    class="upload_img_style" style="cursor: pointer;"
                                                    onclick="openFileInput({{ $annonce->id }})">
                                                <img class="icon_upload_img" src="{{ asset('./images/icons/plus.png') }}"
                                                    alt="upload new picture">
                                            </div>
                                            <input type="file" class="form-control mt-2"
                                                id="file-input{{ $annonce->id }}" name="picture" style="display: none;"
                                                accept="image/*">

                                            <img src="#" id="preview{{ $annonce->id }}"
                                                style="display: none; max-width: 100%;">
                                        </div>


                                        <div class="col-sm-6 parent_info_selling">
                                            <div class="row info_selling mb-2">
                                                <div class="col-3 my-auto">
                                                    <img class="" src="./images/icons/year.png"
                                                        alt="icon-voiture-à-vendre">
                                                </div>
                                                <div class="col-9 ">
                                                    <input type="number" class="form-control" id="year"
                                                        name="year" value="{{ $annonce->year }}" required>
                                                </div>
                                            </div>
                                            <div class="row info_selling mb-2">
                                                <div class="col-3 my-auto">
                                                    <img class="" src="./images/icons/km.png"
                                                        alt="icon-voiture-à-vendre">
                                                </div>
                                                <div class="col-9 ">
                                                    <input type="number" class="form-control" id="km"
                                                        name="km" value="{{ $annonce->km }}" required>
                                                </div>
                                            </div>
                                            <div class="row info_selling mb-2">
                                                <div class="col-3 my-auto">
                                                    <img class="" src="./images/icons/fuel.png"
                                                        alt="icon-voiture-à-vendre">
                                                </div>
                                                <div class="col-9 ">
                                                    {{-- <input type="text" class="form-control" id="fuel" --}}
                                                    {{-- name="fuel" value="{{ $annonce->fuel }}" required> --}}

                                                    <select class="form-control" id="fuel" name="fuel" required>
                                                        <option value="essence"
                                                            @if ($annonce->fuel == 'essence') selected @endif>
                                                            Essence</option>
                                                        <option value="diesel"
                                                            @if ($annonce->fuel == 'diesel') selected @endif>
                                                            Diesel</option>
                                                        <option value="ethanol"
                                                            @if ($annonce->fuel == 'ethanol') selected @endif>
                                                            Ethanol</option>
                                                        <option value="GPL"
                                                            @if ($annonce->fuel == 'GPL') selected @endif>
                                                            GPL</option>
                                                        <option value="electrique"
                                                            @if ($annonce->fuel == 'electrique') selected @endif>Electrique
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row title_car">
                                        <div class="col-6">
                                            <label for="title" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ $annonce->title }}" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Statut</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="0" {{ $annonce->status == 0 ? 'selected' : '' }}>À
                                                    vendre
                                                </option>
                                                <option value="1" {{ $annonce->status == 1 ? 'selected' : '' }}>Vendu
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 title_car">
                                        <label for="title" class="form-label">Lien LBC</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ $annonce->description }}">
                                    </div>
                                    <input type="hidden" name="catalogue" value="catalogueDispo">
                                    <div class="link_lbc mt-3 col-lg-10 col-sm-10 col-6 text-center mx-auto">
                                        <button type="submit" class="btn btn-light">Enregistrer</button>
                                    </div>
                                </form>
                                <form action="{{ route('annonces.destroy', $annonce) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <input type="hidden" name="catalogue" value="catalogueDispo">

                                    {{-- Bouton MODAL --}}
                                    <button class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $annonce->id }}">
                                        <img src="./images/icons/trash.png" alt="supprimer l'annonce"
                                            style="width: 1.4em;">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $annonce->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel{{ $annonce->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title fs-5 text-dark"
                                                        id="exampleModalLabel{{ $annonce->id }}"><b>Suppression</b></h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    Voulez-vous vraiment supprimer l'annonce ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <script>
                                        function openFileInput(annonceId) {
                                            document.getElementById('file-input' + annonceId).click();
                                        }

                                        document.getElementById('file-input{{ $annonce->id }}').addEventListener('change', function(event) {
                                            var input = event.target;
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    document.getElementById('preview{{ $annonce->id }}').setAttribute('src', e.target.result);
                                                    document.getElementById('preview{{ $annonce->id }}').style.display = 'block';
                                                    document.getElementById('old{{ $annonce->id }}').style.display = 'none';
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        });
                                    </script>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>


            <section id="catalogueSold" class="catalogue-section" style="display: none; opacity: 0">
                <div class="col-md-6 mx-auto text-center title_dispo">
                    <h1>Catalogues des véhicules vendus</h1>
                </div>
                <div class="col-lg-11 mx-auto">
                    <div class="row m-0 p-0 justify-content-center">
                        @foreach ($annoncesSold as $annonce)
                            <div class="col-xl-3 col-md-5 col-sm-7 col-12 m-sm-4 m-1 my-3 card-index-forsell">
                                <form action="{{ route('annonces.update', $annonce) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="change_status_icon" style="position: relative">
                                                <img src="{{ asset("./images/annonces/$annonce->picture") }}"
                                                    id="old{{ $annonce->id }}" alt="voitures d'occasion à vendre"
                                                    class="upload_img_style" style="cursor: pointer;"
                                                    onclick="openFileInput({{ $annonce->id }})">
                                                <img class="icon_upload_img" src="{{ asset('./images/icons/plus.png') }}"
                                                    alt="upload new picture">
                                            </div>
                                            <input type="file" class="form-control mt-2"
                                                id="file-input{{ $annonce->id }}" name="picture" style="display: none;"
                                                accept="image/*">

                                            <img src="#" id="preview{{ $annonce->id }}"
                                                style="display: none; max-width: 100%;">
                                        </div>


                                        <div class="col-6 parent_info_selling">
                                            <div class="row info_selling">
                                                <div class="col-3 my-auto">
                                                    <img class="" src="{{ asset('./images/icons/year.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                </div>
                                                <div class="col-9 ">
                                                    <input type="number" class="form-control" id="year"
                                                        name="year" value="{{ $annonce->year }}">
                                                </div>
                                            </div>
                                            <div class="row info_selling">
                                                <div class="col-3 my-auto">
                                                    <img class="" src="{{ asset('./images/icons/km.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                </div>
                                                <div class="col-9 ">
                                                    <input type="number" class="form-control" id="km"
                                                        name="km" value="{{ $annonce->km }}">
                                                </div>
                                            </div>
                                            <div class="row info_selling">
                                                <div class="col-3 my-auto">
                                                    <img class="" src="{{ asset('./images/icons/fuel.png') }}"
                                                        alt="icon-voiture-à-vendre">
                                                </div>
                                                <div class="col-9 ">
                                                    {{-- <input type="text" class="form-control" id="fuel"
                                                        name="fuel" value="{{ $annonce->fuel }}"> --}}
                                                    <select class="form-control" id="fuel" name="fuel" required>
                                                        <option value="essence"
                                                            {{ $annonce->fuel === 'essence' ? 'selected' : '' }}>
                                                            Essence</option>
                                                        <option value="diesel"
                                                            {{ $annonce->fuel === 'diesel' ? 'selected' : '' }}>
                                                            Diesel</option>
                                                        <option value="ethanol"
                                                            {{ $annonce->fuel === 'ethanol' ? 'selected' : '' }}>
                                                            Ethanol</option>
                                                        <option value="GPL"
                                                            {{ $annonce->fuel === 'GPL' ? 'selected' : '' }}>
                                                            GPL</option>
                                                        <option value="electrique"
                                                            {{ $annonce->fuel === 'electrique' ? 'selected' : '' }}>
                                                            Electrique
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row title_car">
                                        <div class="col-6">
                                            <label for="title" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ $annonce->title }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Statut</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="0" {{ $annonce->status == 0 ? 'selected' : '' }}>
                                                    À vendre
                                                </option>
                                                <option value="1" {{ $annonce->status == 1 ? 'selected' : '' }}>
                                                    Vendu
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 title_car">
                                        <label for="title" class="form-label">Lien LBC</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ $annonce->status == 0 ? $annonce->description : '' }}"
                                            placeholder="{{ $annonce->status == 1 ? 'Véhicule déjà vendu' . ($annonce->date_sold ? ' le ' . $annonce->date_sold : '') : '' }}"
                                            {{ $annonce->status == 1 ? 'readonly' : '' }}>
                                    </div>
                                    <input type="hidden" name="catalogue" value="catalogueSold">
                                    <div class="link_lbc mt-4 col-lg-10 col-sm-10 col-6 text-center mx-auto  ">
                                        <button type="submit" class="btn btn-light">Enregistrer</button>
                                    </div>
                                </form>
                                <form action="{{ route('annonces.destroy', $annonce) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <input type="hidden" name="catalogue" value="catalogueSold">

                                    {{-- Bouton MODAL --}}
                                    <button class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $annonce->id }}">
                                        <img src="./images/icons/trash.png" alt="supprimer l'annonce"
                                            style="width: 1.4em;">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $annonce->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel{{ $annonce->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title fs-5 text-dark"
                                                        id="exampleModalLabel{{ $annonce->id }}"><b>Suppression</b></h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    Voulez-vous vraiment supprimer l'annonce ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <script>
                                        function openFileInput(annonceId) {
                                            document.getElementById('file-input' + annonceId).click();
                                        }

                                        document.getElementById('file-input{{ $annonce->id }}').addEventListener('change', function(event) {
                                            var input = event.target;
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    document.getElementById('preview{{ $annonce->id }}').setAttribute('src', e.target.result);
                                                    document.getElementById('preview{{ $annonce->id }}').style.display = 'block';
                                                    document.getElementById('old{{ $annonce->id }}').style.display = 'none';
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        });
                                    </script>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
        <script>
            function showProducts(selectCatalogue) {
                var sectionsCatalogue = document.querySelectorAll('.catalogue-section');
                sectionsCatalogue.forEach(function(sectCatalogue) {
                    if (sectCatalogue.id === selectCatalogue) {
                        sectCatalogue.style.opacity = '1';
                        sectCatalogue.style.display = 'block';
                        sectCatalogue.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    } else {
                        sectCatalogue.style.opacity = '0';
                        sectCatalogue.style.display = 'none';
                    }
                });
            }


            var fragment = window.location.hash.substr(1); // Retrieves the fragment identifier value after the #
            if (fragment !== "") {
                showProducts(fragment)
            } else {
                showProducts('catalogueAdd')
            }
        </script>
    @endsection

@endif
