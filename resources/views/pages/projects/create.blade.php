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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
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
                                <label for="marka" class="form-label">MARKA</label>
                                <input name="marka" type="text" id="marka" class="form-control" placeholder="MARKA">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="modelis" class="form-label">MODELIS</label>
                                <input name="modelis" type="text" id="modelis" class="form-control" placeholder="MODELIS">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="islaiduma" class="form-label">IZLAIDUMA GADS</label>
                                <input name="islaiduma_gads" type="text" id="islaiduma_gads" class="form-control" placeholder="IZLAIDUMA GADS">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="islaiduma" class="form-label">DEGVAELA</label> <br>
                                <table>
                                    <tr>
                                        <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                        <td><label for="vehicle1"> &nbsp;BENZINS</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                        <td><label for="vehicle1"> &nbsp;DIZELIS</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                        <td><label for="vehicle1"> &nbsp;BENZINS + GAZE</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                        <td><label for="vehicle1"> &nbsp;ELEKTRIBA</label></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="islaiduma" class="form-label">ATRUMKARBA</label> <br>
                            <table>
                                <tr>
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                    <td><label for="vehicle1"> &nbsp;AUTOMASTIKA</label></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                    <td><label for="vehicle1"> &nbsp;MANUALA</label></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="motora_tilpums" class="form-label">MOTORA TILPUMS</label>
                                <input name="motora_tilpums" type="text" id="motora_tilpums" class="form-control" placeholder="MOTORA TILPUMS">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="piedzina" class="form-label">PIEDZINA</label>
                                <select class="form-control" name="piedzina">
                                    <option value="4*2">4*2</option>
                                    <option value="4*4">4*4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="virsbuves_tips" class="form-label">VIRSBUVES TIPS</label>
                                <select class="form-control" name="virsbuves_tips">
                                    <option value="sedans">SEDANS</option>
                                    <option value="sedans">UNIVERSALS</option>
                                    <option value="sedans">HECBEKS</option>
                                    <option value="sedans">HECBEKSMINIVENS</option>
                                    <option value="sedans">SUV</option>
                                    <option value="sedans">SUVKABRIO</option>
                                    <option value="sedans">KUBEJA</option>
                                    <option value="sedans">APVIDUS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="sasija_nr" class="form-label">SASIJAS NR.</label>
                                <input name="sasija_nr" type="text" id="sasija_nr" class="form-control" placeholder="SASIJAS NR.">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="transporta_ipasnieks" class="form-label">TRANSPORTA IPASNIEKS</label>
                                <input name="transporta_ipasnieks" type="text" id="transporta_ipasnieks" class="form-control" placeholder="TRANSPORTA IPASNIEKS">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="apskates_vieta" class="form-label">APSKATES VIETA</label>
                                <input name="apskates_vieta" type="text" id="apskates_vieta" class="form-control" placeholder="APSKATES VIETA">
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
