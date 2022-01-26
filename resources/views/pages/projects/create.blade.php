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
                    <form @submit.prevent="submitForm('productDeleteForm')">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Lietas NR.</label>
                                <input type="text" v-model="projectData.lietas_nr" class="form-control" placeholder="Lietas NR">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Mašīnas valsts NR.</label>
                                <input type="text" v-model="projectData.masinas_valsts_nr" class="form-control" placeholder="Mašīnas Valsts NR.">
                            </div>
                        </div>
                    </div>

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
                                    <input id="Benzīns" type="radio" name="degviela" v-model="projectData.degviela" value="Benzīns" class="form-check-input">
                                    <label for="Benzīns" class="form-check-label">Benzīns</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input id="Dīzelis" type="radio" name="degviela" v-model="projectData.degviela" value="Dīzelis" class="form-check-input">
                                    <label for="Dīzelis" class="form-check-label">Dīzelis</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input id="Benzīns_ga" type="radio" name="degviela" v-model="projectData.degviela" value="Benzīns + gāze" class="form-check-input">
                                    <label for="Benzīns_ga" class="form-check-label">Benzīns + gāze</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input id="Elektrība" type="radio" name="degviela" v-model="projectData.degviela" value="Elektrība" class="form-check-input">
                                    <label for="Elektrība" class="form-check-label">Elektrība</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Ātrumkārba</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input id="Automātiskā" type="radio" v-model="projectData.atrumkarba" name="atrumkarba" value="Automātiskā" class="form-check-input">
                                    <label for="Automātiskā" class="form-check-label">Automātiskā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input id="Manuālā" type="radio" v-model="projectData.atrumkarba" name="atrumkarba" value="Manuālā" class="form-check-input">
                                    <label for="Manuālā" class="form-check-label">Manuālā</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Nobraukums</label>
                                <input type="text" v-model="projectData.nobraukums" class="form-control" placeholder="Nobraukums">
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
                                <label class="form-label">Šasijas NR.</label>
                                <input type="text" v-model="projectData.sasija_nr" class="form-control" placeholder="Šasijas NR.">
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
                        <div class="col-lg-9">
                            <h6 class="font-15 mt-3">Aprīkojums</h6>
                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-check mb-2">
                                            <input id="Ksenona" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Ksenona / dienas gaismas lukturi" class="form-check-input">
                                            <label for="Ksenona" class="form-check-label">Ksenona / dienas gaismas lukturi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input id="Ādas" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Ādas salons" class="form-check-input">
                                            <label for="Ādas" class="form-check-label">Ādas salons</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input id="Panorāmas" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Panorāmas lūka" class="form-check-input">
                                            <label for="Panorāmas" class="form-check-label">Panorāmas lūka</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-2">
                                            <input id="Atpakaļskata" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Atpakaļskata kamera" class="form-check-input">
                                            <label for="Atpakaļskata" class="form-check-label">Atpakaļskata kamera</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input id="Distances" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Distances kontrole" class="form-check-input">
                                            <label for="Distances" class="form-check-label">Distances kontrole</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input id="Aklo" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Aklo zonu / joslu kontrole" class="form-check-input">
                                            <label for="Aklo" class="form-check-label">Aklo zonu / joslu kontrole</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-2">
                                            <input id="Papildus" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Papildus signalizācija" class="form-check-input">
                                            <label for="Papildus" class="form-check-label">Papildus signalizācija</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input id="Navigācijas" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Navigācijas ierīce" class="form-check-input">
                                            <label for="Navigācijas" class="form-check-label">Navigācijas ierīce</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input id="Sakabes" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Sakabes āķis" class="form-check-input">
                                            <label for="Sakabes" class="form-check-label">Sakabes āķis</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6 class="font-15 mt-3">Riepu Veids</h6>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input id="Ziemas" type="radio" v-model="projectData.riepu_veids" name="riepu_veids" value="Ziemas" class="form-check-input">
                                                <label for="Ziemas" class="form-check-label">Ziemas</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="Vasaras" type="radio" v-model="projectData.riepu_veids" name="riepu_veids" value="Vasaras" class="form-check-input">
                                                <label for="Vasaras" class="form-check-label">Vasaras</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="font-15 mt-3">Protektoru dziļums</h6>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input id="Atbilst" type="radio" v-model="projectData.protektoru_dziļums" name="protektoru_dziļums" value="Atbilst" class="form-check-input">
                                                <label for="Atbilst" class="form-check-label">Atbilst</label>
                                            </div>

                                            <div class="form-check">
                                                <input id="Neatbilst" type="radio" v-model="projectData.protektoru_dziļums" name="protektoru_dziļums" value="Neatbilst" class="form-check-input">
                                                <label for="Neatbilst" class="form-check-label">Neatbilst</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mt-3">
                            <h6 class="font-15 mt-3"></h6>
                            <div class="form-check mb-2">
                                <input id="Pr" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Pr. PARKING" class="form-check-input">
                                <label for="Pr" class="form-check-label">Pr. PARKING</label>
                            </div>

                            <div class="form-check mb-2">
                                <input id="Tūninga" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Tūninga elementi" class="form-check-input">
                                <label for="Tūninga" class="form-check-label">Tūninga elementi</label>
                            </div>

                            <div class="form-check mb-2">
                                <input id="Cits" type="checkbox" name="aprikojums" v-on:change="otherUtility()" v-model="projectData.aprikojums" value="Cits aprīkojums" class="form-check-input">
                                <label for="Cits" class="form-check-label">Cits aprīkojums</label>
                            </div>

                            <div class="mb-3" v-if="needOtherUtility">
                                <label class="form-label">PIEVIENOT JAUNU</label>
                                <input type="text" v-model="projectData.other_aprikojums" class="form-control" placeholder="Aprīkojums">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="font-15 mt-3">Konstatētie bojājumi</h6>
                        <div class="row">
                            <div class="col-lg-3" v-for="value in bojajumi[0].values">
                                <div class="tip-items"  v-on:click="pickItem(bojajumi[0].type, value)">
                                    @{{value}}
                                </div>
                            </div>
                        </div>
                        <div class="row item-box-height">
                            <div class="col-lg-3" v-for="item in bojajumi" v-if="item.type != 'extras'">
                                <h6 class="font-15 mt-3">@{{item.type}}</h6>
                                <div class="tip-items"  v-for="value in item.values" v-on:click="pickItem(item.type, value)">
                                    @{{value}}
                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="!hasPickedItem()">
                            <div class="col-lg-12">
                                <h6 class="font-15 mt-3">Izvēlētie Bojājumi</h6>
                                <div v-for="(item, type) in projectData.bojajumi">
                                    <div class="tip-items inline-items-md inline-items" v-for="value in item" v-on:click="dropItem(type, value)">
                                        @{{value}}
                                        <i class="mdi mdi-close"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <h6 class="font-15 mt-3">Konstatēti Iepriekšejie Bojājumi</h6>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" v-model="customItem" placeholder="Recipient's username" aria-label="Recipient's username">
                                <button class="btn btn-dark" type="button" v-on:click="addCustomItem()">Add New</button>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="tip-items inline-items-md inline-items" v-for="value in projectData.konstatetie_bojajumi" v-on:click="removeCustomItem(value)">
                                @{{value}}
                                <i class="mdi mdi-close"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <h6 class="font-15 mt-3">Iespējami papildus defekti?</h6>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input id="Iespjami_ja" type="radio" name="iespejami" v-model="projectData.iespejami" value="Jā" class="form-check-input">
                                    <label for="Iespjami_ja" class="form-check-label">Jā</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input id=Iespjami_na" type="radio" name="iespejami" v-model="projectData.iespejami" value="Nē" class="form-check-input">
                                    <label for="Iespjami_na" class="form-check-label">Nē</label>
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
                                    <input id="Es_ja" type="radio" v-model="projectData.piekritu" value="Jā" class="form-check-input">
                                    <label for="Es_ja" class="form-check-label">Jā</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit"  class="btn btn btn-success float-right">Create Project</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-toastr-2/dist/vue-toastr-2.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-toastr-2/dist/vue-toastr-2.min.css">
    <script>
        const INCIDENTS = JSON.parse('<?php echo json_encode($incident); ?>');
        var app = new Vue({
            el: '#app',
            mounted() {
                var initialData = [];
                this.bojajumi.forEach((value, index) => {

                });
            },
            data: {
                customItem: null,
                bojajumi: INCIDENTS,
                projectData: {
                    lietas_nr: null,
                    masinas_valsts_nr: null,
                    marka: null,
                    modelis: null,
                    izlaiduma_gads: null,
                    degviela: null,
                    nobraukums: null,
                    atrumkarba: null,
                    motora_tilpums: null,
                    piedzina: '4*2',
                    virsbuves_tips: 'Sedans',
                    sasija_nr: null,
                    transporta_ipasnieks: null,
                    apskates_vieta: null,
                    aprikojums: [],
                    other_aprikojums: null,
                    riepu_veids: null,
                    protektoru_dziļums: null,
                    iespejami: null,
                    datums: null,
                    eksperts: null,
                    sertefikata: null,
                    piekritu: null,
                    bojajumi: {},
                    konstatetie_bojajumi: []
                },
                needOtherUtility: false
            },

            methods: {
                otherUtility: function () {
                    this.needOtherUtility = this.hasOtherUtility();
                },

                hasPickedItem: function () {
                    return Object.keys(this.projectData.bojajumi).length === 0;
                },

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
                submitForm: function () {
                    let data = this.projectData;
                    data['_token'] = '{{ csrf_token() }}'

                    var options = {
                        type: 'post',
                        url: '/projects/store',
                        dataType: 'json',
                        data: data,
                        encode: true,
                    };
                    var toa = this.$toastr;
                    $.ajax(options)
                        .done(function (response) {
                            toa.success(response.message, 'Success');
                            window.location.href = "/projects";
                        })
                        .fail(function (response) {
                            toa.success('Sorry something went wrong', 'Error');
                        });
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
                },
                addCustomItem: function () {
                    this.projectData.konstatetie_bojajumi.push(this.customItem);
                    this.customItem = null;
                },
                removeCustomItem: function (item) {
                    let items = this.projectData.konstatetie_bojajumi.filter(el => el !== item);
                    this.projectData.konstatetie_bojajumi = items;
                    this.customItem = null;
                },
                hasOtherUtility: function (records) {
                    let needOtherUtility = false;

                    this.projectData.aprikojums.forEach((value, index) => {
                        if(value === 'Cits aprīkojums') {
                            needOtherUtility = true;
                        }
                    });

                    return needOtherUtility;
                }
            }
        })
    </script>
@endsection
