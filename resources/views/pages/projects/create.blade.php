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
                        <h6 class="font-15 mt-3">Konstatēti Iepriekšejie Bojājumi</h6>
                        <div class="row item-box-height">
                            <div class="col-lg-3" v-for="item in bojajumi">
                                <h6 class="font-15 mt-3">@{{item.type}}</h6>
                                <div class="tip-items"  v-for="value in item.values" v-on:click="pickItem(item.type, value)">
                                    @{{value}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h6 class="font-15 mt-3">Izvēlētie Bojājumi</h6>
                                <div v-for="(item, type) in projectData.bojajumi">
                                    <div class="tip-items inline-items-md inline-items" v-for="value in item">
                                        @{{value}}
                                        <i class="mdi mdi-close" v-on:click="dropItem(type, value)"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <h6 class="font-15 mt-3">Konstatētie bojājumi</h6>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
                                <button class="btn btn-dark" type="button">Add New</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Iespējami papildus defekti?</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="iespejami" v-model="projectData.iespejami" value="Jā" class="form-check-input">
                                    <label class="form-check-label">Jā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="iespejami" v-model="projectData.iespejami" value="Nē" class="form-check-input">
                                    <label class="form-check-label">Nē</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Datums</label>
                                <input type="text" v-model="projectData.datums" class="form-control" placeholder="Datums">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Eksperts</label>
                                <input type="text" v-model="projectData.eksperts" class="form-control" placeholder="Eksperts">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Sertefikāta nr.</label>
                                <input type="text" v-model="projectData.sertefikata" class="form-control" placeholder="Sertefikāta nr.">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Es piekrītu ka mani dati</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" v-model="projectData.piekritu" value="Jā" class="form-check-input">
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
                bojajumi: [
                    {
                        type: 'PRIEKŠA',
                        values: [
                            'Priekšējais bamperis',
                            'Priekšējais labais lukturis',
                            'Priekšējais kreisais lukturis',
                            'Priekšējā dekoratīvā reste',
                            'Motora pārsegs',
                            'Priekšējais vējstikls',
                            'Jumta panelis',
                            'Vadītaja AirBag',
                            'Pasažiera AirBag',
                            'Radiatora bloks'
                        ]
                    },
                    {
                        type: 'LABAIS SĀNS',
                        values: [
                            'Aizmugurējais labais sānu panelis',
                            'Aizmugurējās labās durvis',
                            'Labās puses vidus statne',
                            'Labās puses slieksnis',
                            'Priekšējās labās durvis',
                            'Priekšējais labais spārns',
                            'Priekšējā labā riteņa disks ar riepu',
                            'Aizmugurējā labā riteņa disks ar riepu',
                            'Labās puses atpakaļskata spogulis',
                        ]
                    },
                    {
                        type: 'KREISAIS SĀNS',
                        values: [
                            'Priekšējās kreisās durvis',
                            'Kreisās puses slieksnis',
                            'Kreisās puses vidus statne',
                            'Priekšējais kreisais spārns',
                            'Aizmugurējas kreisās dirvis',
                            'Aizmugurējais kreisais sānu panelis',
                            'Aizmugurējais kreisais lukuturis',
                            'Aizmugurējā kreisā riteņa disks ar riepu',
                            'Priekšejā kreisā riteņa disks ar riepu',
                            'Kreisās puses atpakaļskata spogulis'
                        ]
                    },
                    {
                        type: 'AIZMUGURE',
                        values: [
                            'Aizmugurējais bamperis',
                            'Aizmugurējais labais lukturis',
                            'Aizmugurējais kreisais lukturis',
                            'Aizmugurējais panelis',
                            'Aizmugurējais stikls',
                            'Bagāžnieka vāks/gala durvis'
                        ]
                    }
                ],
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
                    bojajumi: {}
                }
            },
            computed: {
                itemVisibility: function (type, item) {
                    if(this.projectData.bojajumi[type] != undefined && !this.projectData.bojajumi[type].includes(item)) {
                        return 'hide_it';
                    }
                }
            },
            methods: {
                dropItem: function (type, item) {
                    if(!this.projectData.bojajumi.hasOwnProperty(type)) {
                        this.projectData.bojajumi[type] = [];
                    }

                    let selectedItems = this.projectData.bojajumi[type].filter(el => el !== item);
                    this.projectData.bojajumi[type] = selectedItems;
                    this.addItemFrom(type, item);
                },

                pickItem: function (type, item) {
                    if(!this.projectData.bojajumi.hasOwnProperty(type)) {
                        this.projectData.bojajumi[type] = [];
                    }

                    if(!this.projectData.bojajumi[type].includes(item)) {
                        this.projectData.bojajumi[type].push(item);
                    }
                    this.removeItemFrom(type, item);
                },
                saveProject: function () {
                    console.log(this.projectData);
                },
                removeItemFrom: function (type, item) {
                    let remainingItem = [];
                    let itemIndex = null;
                    this.bojajumi.forEach((value,index ) => {
                        if(value.type === type) {
                            itemIndex = index;
                            remainingItem = value.values.filter(el => el !== item);
                        }
                    });
                    this.bojajumi[itemIndex].values = remainingItem;
                },
                addItemFrom: function (type, item) {
                    let itemIndex = null;
                    this.bojajumi.forEach((value, index) => {
                        if (value.type === type) {
                            itemIndex = index;
                        }
                    });

                    this.bojajumi[itemIndex].values.push(item);
                }
            }
        })
    </script>
@endsection
