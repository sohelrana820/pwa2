@extends('layouts.main')

@section('title')
    @if(isset($model->id))
        Update User
    @else
        Add User
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/products">Projects</a></li>
                        <li class="breadcrumb-item active">Create Project</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Project</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('projects.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="marka" class="form-label">Marka</label>
                                <input name="marka" type="text" id="marka" class="form-control" placeholder="Marka">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="modelis" class="form-label">Modelis</label>
                                <input name="modelis" type="text" id="modelis" class="form-control" placeholder="Modelis">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="islaiduma" class="form-label">Izlaiduma Gads</label>
                                <input name="islaiduma_gads" type="text" id="islaiduma_gads" class="form-control" placeholder="Izlaiduma Gads">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Degviela</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Benzīns" class="form-check-input">
                                    <label class="form-check-label" for="Benzīns">Benzīns</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Dīzelis" class="form-check-input">
                                    <label class="form-check-label" for="Dīzelis">Dīzelis</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="benzīns_gāze" class="form-check-input">
                                    <label class="form-check-label" for="benzīns_gāze">Benzīns + gāze</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="elektrība" class="form-check-input">
                                    <label class="form-check-label" for="elektrība">Elektrība</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <h6 class="font-15 mt-3">Ātrumkārba</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Automātiskā" class="form-check-input">
                                    <label class="form-check-label" for="Automātiskā">Automātiskā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Manuālā" class="form-check-input">
                                    <label class="form-check-label" for="Manuālā">Manuālā</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="motora_tilpums" class="form-label">Motora tilpums</label>
                                <input name="motora_tilpums" type="text" id="motora_tilpums" class="form-control" placeholder="Motora tilpums">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="piedzina" class="form-label">Piedziņa</label>
                                <select class="form-control" name="piedzina">
                                    <option value="4*2">4*2</option>
                                    <option value="4*4">4*4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="virsbuves_tips" class="form-label">Virsbūves Tips</label>
                                <select class="form-control" name="virsbuves_tips">
                                    <option>Sedans</option>
                                    <option>Universāls</option>
                                    <option>Hečbeks</option>
                                    <option>Minivens</option>
                                    <option>SUV</option>
                                    <option>Kabrio</option>
                                    <option>Kupeja</option>
                                    <option>Apvidus</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="sasija_nr" class="form-label">Sasijas NR.</label>
                                <input name="sasija_nr" type="text" id="sasija_nr" class="form-control" placeholder="Sasijas NR.">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="transporta_ipasnieks" class="form-label">Transportlīdzekļa īpašnieks</label>
                                <input name="transporta_ipasnieks" type="text" id="transporta_ipasnieks" class="form-control" placeholder="Transportlīdzekļa īpašnieks">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="apskates_vieta" class="form-label">Apskates Vieta</label>
                                <input name="apskates_vieta" type="text" id="apskates_vieta" class="form-control" placeholder="Apskates Vieta">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h6 class="font-15 mt-3">Aprīkojums</h6>
                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="Benzīns" class="form-check-input">
                                            <label class="form-check-label" for="Benzīns">Ksenona / dienas gaismas lukturi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="Dīzelis" class="form-check-input">
                                            <label class="form-check-label" for="Dīzelis">Ādas salons</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="benzīns_gāze" class="form-check-input">
                                            <label class="form-check-label" for="benzīns_gāze">Panorāmas lūka</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Atpakaļskata kamera</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Distances kontrole</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Aklo zonu / joslu kontrole</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Papildus signalizācija</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Navigācijas ierīce</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Sakabes āķis</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Pr. PARKING</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Tūninga elementi</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" id="elektrība" class="form-check-input">
                                            <label class="form-check-label" for="elektrība">Cits aprīkojums</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="font-15 mt-3">Degviela</h6>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="font-15 mt-3">PRIEKŠA</h6>
                                <div class="tip-items">Priekšējais bamperis</div>
                                <div class="tip-items active">Priekšējais labais lukturis</div>
                                <div class="tip-items">Priekšējais kreisais lukturis</div>
                                <div class="tip-items active">Priekšējā dekoratīvā reste</div>
                                <div class="tip-items">Motora pārsegs</div>
                                <div class="tip-items">Priekšējais vējstikls</div>
                                <div class="tip-items">Vadītaja AirBag</div>
                                <div class="tip-items">Pasažiera AirBag</div>
                                <div class="tip-items">Radiatora bloks</div>
                            </div>

                            <div class="col-lg-3">
                                <h6 class="font-15 mt-3">PRIEKŠA</h6>
                                <div class="tip-items">Priekšējais bamperis</div>
                                <div class="tip-items">Priekšējais labais lukturis</div>
                                <div class="tip-items">Priekšējais kreisais lukturis</div>
                                <div class="tip-items">Priekšējā dekoratīvā reste</div>
                                <div class="tip-items">Motora pārsegs</div>
                                <div class="tip-items">Priekšējais vējstikls</div>
                                <div class="tip-items">Vadītaja AirBag</div>
                                <div class="tip-items">Pasažiera AirBag</div>
                                <div class="tip-items">Radiatora bloks</div>
                            </div>

                            <div class="col-lg-3">
                                <h6 class="font-15 mt-3">PRIEKŠA</h6>
                                <div class="tip-items">Priekšējais bamperis</div>
                                <div class="tip-items">Priekšējais labais lukturis</div>
                                <div class="tip-items">Priekšējais kreisais lukturis</div>
                                <div class="tip-items">Priekšējā dekoratīvā reste</div>
                                <div class="tip-items">Motora pārsegs</div>
                                <div class="tip-items">Priekšējais vējstikls</div>
                                <div class="tip-items">Vadītaja AirBag</div>
                                <div class="tip-items">Pasažiera AirBag</div>
                                <div class="tip-items">Radiatora bloks</div>
                            </div>

                            <div class="col-lg-3">
                                <h6 class="font-15 mt-3">PRIEKŠA</h6>
                                <div class="tip-items">Priekšējais bamperis</div>
                                <div class="tip-items">Priekšējais labais lukturis</div>
                                <div class="tip-items">Priekšējais kreisais lukturis</div>
                                <div class="tip-items">Priekšējā dekoratīvā reste</div>
                                <div class="tip-items">Motora pārsegs</div>
                                <div class="tip-items">Priekšējais vējstikls</div>
                                <div class="tip-items">Vadītaja AirBag</div>
                                <div class="tip-items">Pasažiera AirBag</div>
                                <div class="tip-items">Radiatora bloks</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <h6 class="font-15 mt-3">Konstatēti iepriekšejie bojājumi (Atbilstoši izlaidumu gadam un nobraukumam , leter will be more values)</h6>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
                                <button class="btn btn-dark" type="button">Button</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-md inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                        </div>

                        <div class="col-lg-12">
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                            <div class="tip-items inline-items-sm inline-items">Priekšējais bamperis <i class="mdi mdi-close"></i></div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Iespējami papildus defekti?</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Benzīns" class="form-check-input">
                                    <label class="form-check-label" for="Benzīns">Jā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Dīzelis" class="form-check-input">
                                    <label class="form-check-label" for="Dīzelis">Nē</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="marka" class="form-label">Datums</label>
                                <input name="marka" type="text" id="marka" class="form-control" placeholder="Marka">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="modelis" class="form-label">Eksperts</label>
                                <input name="modelis" type="text" id="modelis" class="form-control" placeholder="Modelis">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="islaiduma" class="form-label">Sertefikāta nr.</label>
                                <input name="islaiduma_gads" type="text" id="islaiduma_gads" class="form-control" placeholder="Izlaiduma Gads">
                            </div>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Es piekrītu ka mani dati</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="Benzīns" class="form-check-input">
                                    <label class="form-check-label" for="Benzīns">Jā</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success float-right">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>
@endsection
