@extends('layouts.main')

@section('title')
    Atjaunināt projektu
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Sākums</a></li>
                        <li class="breadcrumb-item"><a href="/projects">Protokoli</a></li>
                        <li class="breadcrumb-item active">Izveidot protokolu</li>
                    </ol>
                </div>
                <h4 class="page-title">Izveidot protokolu</h4>
            </div>
        </div>
    </div>

    <div class="row" id="app">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="submitForm()">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Lietas NR.</label>
                                    <input type="text" v-model="projectData.lietas_nr" class="form-control" placeholder="Lietas NR">
                                    <small class="text-danger err-txt" v-text="errorMessage('lietas_nr')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Mašīnas valsts NR.</label>
                                    <input type="text" v-model="projectData.masinas_valsts_nr" class="form-control" placeholder="Mašīnas Valsts NR.">
                                    <small class="text-danger err-txt" v-text="errorMessage('masinas_valsts_nr')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Izlaiduma Gads</label>
                                    <input type="text" v-model="projectData.izlaiduma_gads" class="form-control" placeholder="Izlaiduma Gads">
                                    <small class="text-danger err-txt" v-text="errorMessage('izlaiduma_gads')"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Marka</label>
                                    <input type="text" v-model="projectData.marka" class="form-control" placeholder="Marka">
                                    <small class="text-danger err-txt" v-text="errorMessage('marka')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Modelis</label>
                                    <input type="text" v-model="projectData.modelis" class="form-control" placeholder="Modelis">
                                    <small class="text-danger err-txt" v-text="errorMessage('modelis')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Nobraukums</label>
                                    <input type="text" v-model="projectData.nobraukums" class="form-control" placeholder="Nobraukums">
                                    <small class="text-danger err-txt" v-text="errorMessage('nobraukums')"></small>
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

                                    <div>
                                        <small class="text-danger err-txt" v-text="errorMessage('degviela')"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h6 class="font-15 mt-3">Ātrumkārba</h6>
                                <div class="mt-2 mb-3">
                                    <div class="form-check form-check-inline">
                                        <input id="Automātiskā" type="radio" v-model="projectData.atrumkarba" name="atrumkarba" value="Automātiskā" class="form-check-input">
                                        <label for="Automātiskā" class="form-check-label">Automātiskā</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="Manuālā" type="radio" v-model="projectData.atrumkarba" name="atrumkarba" value="Manuālā" class="form-check-input">
                                        <label for="Manuālā" class="form-check-label">Manuālā</label>
                                    </div>
                                </div>
                                <small class="text-danger err-txt" v-text="errorMessage('atrumkarba')"></small>
                            </div>
                            <div class="col-lg-4">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Motora tilpums</label>
                                    <input name="motora_tilpums" type="text" v-model="projectData.motora_tilpums" class="form-control" placeholder="Motora tilpums">
                                    <small class="text-danger err-txt" v-text="errorMessage('motora_tilpums')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Piedziņa</label>
                                    <select class="form-control" v-model="projectData.piedzina">
                                        <option value="4*2">4*2</option>
                                        <option value="4*4">4*4</option>
                                    </select>
                                    <small class="text-danger err-txt" v-text="errorMessage('piedzina')"></small>
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
                                    <small class="text-danger err-txt" v-text="errorMessage('virsbuves_tips')"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Šasijas NR.</label>
                                    <input maxlength="17" type="text" :class="licenceValid" v-model="projectData.sasija_nr" class="form-control" placeholder="Šasijas NR." v-on:keyup="countLicenceNo">
                                    <small class="text-danger err-txt" v-if="licenceValid == 'is-invalid'">Šasijas NR. jābūt 1-17 cipariem!</small>
                                    <small class="text-danger err-txt" v-if="licenceValid == 'empty'" v-text="errorMessage('sasija_nr')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Transportlīdzekļa īpašnieks</label>
                                    <input type="text" v-model="projectData.transporta_ipasnieks" class="form-control" placeholder="Transportlīdzekļa īpašnieks">
                                    <small class="text-danger err-txt" v-text="errorMessage('transporta_ipasnieks')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Apskates vieta / Datums</label>
                                    <input type="text" v-model="projectData.apskates_vieta" class="form-control" placeholder="Apskates vieta / Datums">
                                    <small class="text-danger err-txt" v-text="errorMessage('apskates_vieta')"></small>
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
                                        <div class="col-lg-3">
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
                                        <div class="col-lg-3">
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
                                        <div class="col-lg-3">
                                            <h6 class="font-15"></h6>
                                            <div class="form-check mb-2">
                                                <input id="Pr" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Pr. PARKING" class="form-check-input">
                                                <label for="Pr" class="form-check-label">Pr. PARKING</label>
                                            </div>

                                            <div class="form-check mb-2">
                                                <input id="Tūninga" type="checkbox" name="aprikojums" v-model="projectData.aprikojums" value="Tūninga elementi" class="form-check-input">
                                                <label for="Tūninga" class="form-check-label">Tūninga elementi</label>
                                            </div>

                                            <div class="form-check mb-2">
                                                <input id="CiŠasijas NR.ts" type="checkbox" name="aprikojums" v-on:change="otherUtility()" v-model="projectData.aprikojums" value="Cits aprīkojums" class="form-check-input">
                                                <label for="Cits" class="form-check-label">Cits aprīkojums</label>
                                            </div>

                                            <div class="mb-3" v-if="needOtherUtility">
                                                <label class="form-label">PIEVIENOT JAUNU</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" placeholder="Aprīkojums" v-model="otherEqu">
                                                    <button class="btn btn-dark" type="button" v-on:click="addOtherEqu()">Pievieno Jaunu</button>
                                                </div>

                                                <div class="tip-items inline-items-xs inline-items" v-for="value in projectData.other_aprikojums" v-on:click="removeOtherEqu(value)">
                                                    @{{value}}
                                                    <i class="mdi mdi-close"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
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
                                                <small class="text-danger err-txt" v-text="errorMessage('riepu_veids')"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <h6 class="font-15 mt-3">Protektoru dziļums</h6>
                                            <div class="mt-2">
                                                <div class="form-check">
                                                    <input id="Atbilst" type="radio" v-model="projectData.protektoru_dzilums" name="protektoru_dzilums" value="Atbilst" class="form-check-input">
                                                    <label for="Atbilst" class="form-check-label">Atbilst</label>
                                                </div>

                                                <div class="form-check">
                                                    <input id="Neatbilst" type="radio" v-model="projectData.protektoru_dzilums" name="protektoru_dzilums" value="Neatbilst" class="form-check-input">
                                                    <label for="Neatbilst" class="form-check-label">Neatbilst</label>
                                                </div>
                                                <small class="text-danger err-txt" v-text="errorMessage('protektoru_dzilums')"></small>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <h6 class="font-15 mt-3">Protektora mērijums</h6>
                                            <input type="text" v-model="projectData.protektora_merijums" class="form-control" placeholder="Protektora mērijums">
                                            <small class="text-danger err-txt" v-text="errorMessage('protektora_merijums')"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="font-15 mt-3">Konstatētie bojājumi</h6>
                            <div class="row">
                                <div v-if="bojajumi.length > 0" class="col-lg-3" v-for="value in bojajumi[0].values">
                                    <div class="tip-items"  v-on:click="pickItem(bojajumi[0].type, value)">
                                        @{{value}}
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div style="margin-top:-25px;">
                                        <label class="form-label"></label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" placeholder="Konstatētie bojājumi" v-model="additional_extra_damage">
                                            <button class="btn btn-dark" type="button" v-on:click="addAdditionalExtraDamage()">Pievieno Jaunu</button>
                                        </div>
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

                        <!-- Dropzone container -->
                        <div id="myDropZone" class="dropzone dropzone-design">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                        </div>

                        <div class="row mb-2">
                            <h6 class="font-15 mt-3">Konstatēti Iepriekšejie Bojājumi</h6>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <select class="form-control" multiple v-model="definedPreviousDamages" v-on:change="manageCustomPreviousDamage()">
                                        <option v-for="options in previousDamagesOptions">@{{ options }}</option>
                                    </select>
                                </div>

                                <div v-if="needOtherItem" class="mt-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control" v-model="previousCustomDamage">
                                        <button class="btn btn-dark" type="button" v-on:click="addCustomPreviousDamage()">Pievieno Jaunu</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-2">
                                <div class="tip-items inline-items-xs inline-items" v-for="value in projectData.konstatetie_bojajumi" v-on:click="removeCustomPreviousDamage(value)">
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
                                <small class="text-danger err-txt" v-text="errorMessage('iespejami')"></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Datums</label>
                                    <input type="text" v-model="projectData.datums" class="form-control" placeholder="Datums">
                                    <small class="text-danger err-txt" v-text="errorMessage('datums')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Eksperts</label>
                                    <input type="text" v-model="projectData.eksperts" class="form-control" placeholder="Eksperts">
                                    <small class="text-danger err-txt" v-text="errorMessage('eksperts')"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Sertifikāta nr.</label>
                                    <input type="text" v-model="projectData.sertefikata" class="form-control" placeholder="Sertifikāta nr.">
                                    <small class="text-danger err-txt" v-text="errorMessage('sertefikata')"></small>
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
                                <small class="text-danger err-txt" v-text="errorMessage('piekritu')"></small>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit"  class="btn btn btn-success float-right">Saglabāt</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-toastr-2/dist/vue-toastr-2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.3/min/dropzone.min.js"></script>

    <script>
        UNIQUE_ID = '_' + Math.random().toString(36).substr(2, 12);
        FILES_CHANGES = false;
        FILES = JSON.parse('<?php echo json_encode($image_name); ?>');
        PREVIOUS_IMAGES = JSON.parse('<?php echo json_encode($image_list); ?>');

        Dropzone.autoDiscover = false;
        $(function () {
            var dropdoneInstance = new Dropzone('#myDropZone', {
                url: "/media/upload",
                acceptedFiles: "image/jpeg,image/png,image/gif",
                addRemoveLinks: true,
                uploadMultiple: true,
                parallelUploads: 50,
                headers: {
                    "X-CSRF-Token" : "{{ csrf_token() }}",
                    "X-UniqueId" : UNIQUE_ID
                },
            })

            dropdoneInstance.on("success",function(file) {
                FILES.push(file.name);
                FILES_CHANGES = true;
            });

            dropdoneInstance.on("removedfile",function(file) {
                let files = FILES.filter(el => el !== file.name);
                FILES = files;
                FILES_CHANGES = true;
            });

            dropdoneInstance.on("error",function(file, res) {
                toastr.error(res, 'Kļūda');
                this.removeFile(file);
            });

            for(let i = 0; i < PREVIOUS_IMAGES.length; i++) {
                let img = PREVIOUS_IMAGES[i];
                var mockFile = {name: img.name, url: img.url};
                dropdoneInstance.emit("addedfile", mockFile);
                dropdoneInstance.emit("thumbnail", mockFile, img.url);
                dropdoneInstance.emit("complete", mockFile);
            }
        });


        const PROJECT_DATA_RAW  = '<?php echo json_encode($project); ?>';
        const PROJECT_DATA = JSON.parse(PROJECT_DATA_RAW);
        var app = new Vue({
            el: '#app',
            data: {
                additional_extra_damage: null,
                previousDamagesOptions: PREVIOUS_DAMAGES,
                definedPreviousDamages: [],
                previousCustomDamage: null,
                previousCustomDamageList: [],
                bojajumi: [INCIDENTS],
                otherEqu: null,
                projectData: PROJECT_DATA,
                needOtherUtility: false,
                needOtherItem: false,
                formErrors: {},
                licenceValid: 'empty',
            },

            mounted() {
                let incidents = [];
                INCIDENTS.forEach((value,index ) => {
                    var difference = value.values;
                    if(this.projectData.bojajumi[value.type] != undefined) {
                        difference = value.values.filter(x => this.projectData.bojajumi[value.type].indexOf(x) === -1);
                    }

                    incidents.push({
                        type: value.type,
                        values: difference
                    })
                });

                let previousPreviousManages = [];
                let hasOther = false;
                this.projectData.konstatetie_bojajumi.forEach((value,index ) => {
                    if(this.previousDamagesOptions.includes(value) == false) {
                        hasOther = true;
                    } else {
                        this.definedPreviousDamages.push(value)
                    }
                });

                if(hasOther) {
                    this.definedPreviousDamages.push('Cits')
                }

                //this.definedPreviousDamages = this.projectData.konstatetie_bojajumi;

                this.bojajumi = incidents;
                this.needOtherItem = this.hasOtherDamageValue();
                this.needOtherUtility = this.hasOtherUtility();
            },

            methods: {
                addAdditionalExtraDamage: function () {
                    this.pickItem('extras', this.additional_extra_damage);
                    this.additional_extra_damage = null;
                },

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
                    this.formErrors = {};
                    let projectData = this.projectData;
                    let errorField = [];
                    let hasError = false;
                    Object.keys(projectData).forEach(key => {
                        if(typeof projectData[key] != 'object') {
                            if(projectData[key] == null || projectData[key] == '') {
                                errorField[key] = "Šis lauks ir obligāts!";
                                hasError = true;
                            }

                            if(projectData[key] && key === 'sasija_nr' && projectData[key].length > 17) {
                                errorField[key] = "Šasijas NR. jābūt 1-17 cipariem!";
                                hasError = true;
                            }
                        }
                    });

                    var toa = this.$toastr;
                    if(hasError == false) {
                        let data = projectData;
                        data['_token'] = '{{ csrf_token() }}'
                        data['files'] = {files: FILES, unique_id: UNIQUE_ID, changed: FILES_CHANGES}
                        axios.put('/projects/update/<?php echo $projectId;?>', data)
                            .then((response) => {
                                toa.success(response.data.message, 'Panākumi')
                                window.location.href = "/projects";
                            })
                            .catch((error) => {
                                this.formErrors = this.unprocessableEntityHandler(error.response.data.errors);
                                toa.error(error.response.data.message, 'Kļūda');
                            })
                            .finally(() => {

                            });
                    } else {
                        this.formErrors = errorField;
                        toa.error('Norādītie dati nav derīgi', 'Kļūda');
                    }
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

                addCustomPreviousDamage: function () {
                    this.previousCustomDamageList.push(this.previousCustomDamage);
                    this.projectData.konstatetie_bojajumi.push(this.previousCustomDamage);
                    this.previousCustomDamage = null;
                },
                removeCustomPreviousDamage: function (item) {
                    this.projectData.konstatetie_bojajumi = this.projectData.konstatetie_bojajumi.filter(el => el !== item);
                    this.previousCustomDamage = null;
                },

                addOtherEqu: function () {
                    this.previousCustomDamageList.push(this.otherEqu);
                    this.projectData.other_aprikojums.push(this.otherEqu);
                    this.otherEqu = null;
                },

                removeOtherEqu: function (item) {
                    this.projectData.other_aprikojums = this.projectData.other_aprikojums.filter(el => el !== item);
                    this.otherEqu = null;
                },

                hasOtherUtility: function () {
                    let needOtherUtility = false;

                    this.projectData.aprikojums.forEach((value, index) => {
                        if(value === 'Cits aprīkojums') {
                            needOtherUtility = true;
                        }
                    });

                    return needOtherUtility;
                },

                hasOtherDamageValue: function () {
                    let needOther = false;
                    this.projectData.konstatetie_bojajumi.forEach((value, index) => {
                        if(value === 'Cits') {
                            needOther = true;
                        }
                    });

                    if(needOther) {
                        let remainingItem = this.projectData.konstatetie_bojajumi.filter(el => el !== 'Cits');
                        this.projectData.konstatetie_bojajumi = remainingItem;
                    }
                    return needOther;
                },

                manageCustomPreviousDamage: function () {
                    this.projectData.konstatetie_bojajumi = this.definedPreviousDamages;
                    this.needOtherItem = this.hasOtherDamageValue();
                    this.projectData.konstatetie_bojajumi = this.projectData.konstatetie_bojajumi.concat(this.previousCustomDamageList);
                },

                errorMessage: function (field) {
                    if(this.formErrors[field] != undefined && this.formErrors[field]) {
                        return this.formErrors[field];
                    }
                },

                unprocessableEntityHandler(errors) {
                    let newErrors = {};

                    for (const key in errors) {
                        if (Object.hasOwnProperty.call(errors, key)) {
                            const fieldError = errors[key];
                            newErrors[key] = fieldError[0] ?? '-';
                        }
                    }

                    return newErrors;
                },
                countLicenceNo() {
                    this.licenceValid = 'is-invalid';
                    if(this.projectData.sasija_nr && this.projectData.sasija_nr.length > 0 && this.projectData.sasija_nr.length < 18) {
                        this.licenceValid = 'is-valid'
                    }
                },
            }
        })
    </script>
@endsection
