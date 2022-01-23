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

    <div class="row" id="app">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Marka</label>
                                <input type="text" v-model="projectData.marka" class="form-control" placeholder="Marka">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Modelis</label>
                                <input type="text" v-model="projectData.modelis" class="form-control" placeholder="Modelis">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Izlaiduma Gads</label>
                                <input type="text" v-model="projectData.izlaiduma_gads" class="form-control" placeholder="Izlaiduma Gads">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Degviela</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="degviela" v-model="projectData.degviela" value="Benzīns" class="form-check-input">
                                    <label class="form-check-label">Benzīns</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="degviela" v-model="projectData.degviela" value="Dīzelis" class="form-check-input">
                                    <label class="form-check-label">Dīzelis</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="degviela" v-model="projectData.degviela" value="Benzīns + gāze" class="form-check-input">
                                    <label class="form-check-label">Benzīns + gāze</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="degviela" v-model="projectData.degviela" value="Elektrība" class="form-check-input">
                                    <label class="form-check-label">Elektrība</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <h6 class="font-15 mt-3">Ātrumkārba</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" v-model="projectData.atrumkarba" name="atrumkarba" value="Automātiskā" class="form-check-input">
                                    <label class="form-check-label">Automātiskā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" v-model="projectData.atrumkarba" name="atrumkarba" value="Manuālā" class="form-check-input">
                                    <label class="form-check-label">Manuālā</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Motora tilpums</label>
                                <input name="motora_tilpums" type="text" v-model="projectData.motora_tilpums" class="form-control" placeholder="Motora tilpums">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Piedziņa</label>
                                <select class="form-control" v-model="projectData.piedzina">
                                    <option value="4*2">4*2</option>
                                    <option value="4*4">4*4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Virsbūves Tips</label>
                                <select class="form-control" v-model="projectData.virsbuves_tips">
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
                                <label class="form-label">Sasijas NR.</label>
                                <input type="text" v-model="projectData.sasija_nr" class="form-control" placeholder="Sasijas NR.">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Transportlīdzekļa īpašnieks</label>
                                <input type="text" v-model="projectData.transporta_ipasnieks" class="form-control" placeholder="Transportlīdzekļa īpašnieks">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Apskates Vieta</label>
                                <input type="text" v-model="projectData.apskates_vieta" class="form-control" placeholder="Apskates Vieta">
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
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Ksenona / dienas gaismas lukturi" class="form-check-input">
                                            <label class="form-check-label">Ksenona / dienas gaismas lukturi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Ādas salons" class="form-check-input">
                                            <label class="form-check-label">Ādas salons</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Panorāmas lūka" class="form-check-input">
                                            <label class="form-check-label" for="Panorāmas">Panorāmas lūka</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Atpakaļskata kamera" class="form-check-input">
                                            <label class="form-check-label">Atpakaļskata kamera</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Distances kontrole" class="form-check-input">
                                            <label class="form-check-label">Distances kontrole</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Aklo zonu / joslu kontrole" class="form-check-input">
                                            <label class="form-check-label">Aklo zonu / joslu kontrole</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Papildus signalizācija" class="form-check-input">
                                            <label class="form-check-label">Papildus signalizācija</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Navigācijas ierīce" class="form-check-input">
                                            <label class="form-check-label">Navigācijas ierīce</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Sakabes āķis" class="form-check-input">
                                            <label class="form-check-label">Sakabes āķis</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Pr. PARKING" class="form-check-input">
                                            <label class="form-check-label">Pr. PARKING</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Tūninga elementi" class="form-check-input">
                                            <label class="form-check-label">Tūninga elementi</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Cits aprīkojums" class="form-check-input">
                                            <label class="form-check-label">Cits aprīkojums</label>
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
                                    <input type="radio" name="iespejami" v-model="iespejami" value="Jā" class="form-check-input">
                                    <label class="form-check-label">Jā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="iespejami" v-model="iespejami" value="Nē" class="form-check-input">
                                    <label class="form-check-label">Nē</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Datums</label>
                                <input type="text" v-model="datums" class="form-control" placeholder="Datums">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Eksperts</label>
                                <input type="text" v-model="eksperts" class="form-control" placeholder="Eksperts">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Sertefikāta nr.</label>
                                <input type="text" v-model="sertefikata" class="form-control" placeholder="Sertefikāta nr.">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Es piekrītu ka mani dati</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" v-model="piekritu" value="Jā" class="form-check-input">
                                    <label class="form-check-label">Jā</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" v-on:click="saveProject()" class="btn btn btn-success float-right">Create Project</button>
                    </div>
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
                projectData: {
                    marka: null,
                    modelis: null,
                    izlaiduma_gads: null,
                    degviela: null,
                    atrumkarba: null,
                    motora_tilpums: null,
                    piedzina: '4*2',
                    virsbuves_tips: 'Sedans',
                    sasija_nr: null,
                    transporta_ipasnieks: null,
                    apskates_vieta: null,
                    aprikojums: [],
                    iespejami: null,
                    datums: null,
                    eksperts: null,
                    sertefikata: null,
                    piekritu: null,
                }
            },
            methods: {
                saveProject: function () {
                    console.log(this.projectData);
                }
            }
        })
    </script>
@endsection
