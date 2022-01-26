@extends('layouts.main')

@section('title')
    Projects
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Sākums</a></li>
                        <li class="breadcrumb-item"><a href="/projects">Protokoli</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Details</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="/projects" class="btn btn-danger mb-2">
                                <i class="mdi mdi-plus-circle me-2"></i> Atpakaļ uz projektiem
                            </a>
                        </div>
                    </div>

                    <table class="table table-centered w-100 dt-responsive nowrap">
                        <?php foreach ($project as $key => $item): ?>
                        <tr>
                            <td><span class="text-capitalize"><?php echo $key ?></span></td>
                            <td>
                                <?php
                                if(is_array($item)) {
                                    foreach ($item as $itemKey => $value) {

                                        echo !is_numeric($itemKey) ? "<h5>{$itemKey}</h5>" : '';
                                        if(is_array($value)) {

                                            foreach ($value as $single) {
                                                echo $single . '</br>';
                                            }

                                        } else {
                                            echo $value . '</br>';
                                        }

                                    }
                                } else {
                                    echo $item;
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection
