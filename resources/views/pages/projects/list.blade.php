@extends('layouts.main')

@section('title')
    Protokoli
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
                <h4 class="page-title">Protokoli</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php if($projects->count() > 0): ?>
                    <div class="card-body" >
                        <div class="row mb-2 justify-content-between">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <a href="{{ route('projects.create') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> Jauns Projekts
                                </a>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="text-sm-end">
                                    <form method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Meklēt" name="q" aria-label="Meklēt" value=" {{request()->query('q')}}">
                                            <button class="btn btn-dark" type="submit">Meklēt</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="product-datatable">
                                <thead class="table-light">
                                <tr>
                                    <th>Protokoli</th>
                                    <th>Lietas NR.</th>
                                    <th>Mašinas NR.</th>
                                    <th>Izveidots plkst</th>
                                    <th>Atjaunināts plkst</th>
                                    <th class="text-end">Rīcība</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <a href="{{ route('projects.show', ['id' => $project->id]) }}">{{ $project->id }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('projects.show', ['id' => $project->id]) }}">
                                            <?php
                                            $lietas_nr = null;
                                            foreach ($project->projectMeta as $meta) {
                                                if($meta->meta_key == 'lietas_nr') {
                                                    echo $lietas_nr = $meta->meta_value ? $meta->meta_value : '-';
                                                }
                                            }
                                            ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('projects.show', ['id' => $project->id]) }}">
                                            <?php
                                            foreach ($project->projectMeta as $meta) {
                                                if($meta->meta_key == 'masinas_valsts_nr') {
                                                    echo $meta->meta_value ? $meta->meta_value : '-';
                                                }
                                            }
                                            ?>
                                            </a>
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($project->created_at)) }}</td>
                                        <td>{{ date('d M, Y', strtotime($project->updated_at)) }}</td>
                                        <td class="table-action text-end">

                                            <span class="projectGallery">
                                                <?php foreach ($project->ProjectImages as $key => $image):
                                                $name = str_replace($project->id.'/', '', strstr($image['url_path'], $project->id.'/'));
                                                ?>
                                                    <a href="<?php echo $image['url_path']; ?>" title="<?php echo $name; ?>">
                                                        <?php
                                                        echo $key == 0 ? 'Attēlu galerija' : '';
                                                        ?>
                                                        <img src="<?php echo $image['url_path']; ?>" alt="<?php echo $name; ?>" class="img-fluid">
                                                    </a>
                                                <?php endforeach; ?>
                                            </span>


                                            <a href="mailto:odbproductionlv@gmail.com?Subject=Lietas NR. (<?php echo $lietas_nr ?>)" class="action-icon text-info" title="Sūtīt e-pastu">
                                                <i class="mdi mdi-email-send"></i>
                                            </a>

                                            <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="action-icon text-success" title="Eksportēt kā PDF">
                                                <i class="mdi mdi-file-pdf-outline"></i>
                                            </a>
                                            <a href="{{ route('projects.update', ['id' => $project->id]) }}" class="action-icon text-primary" title="Atjaunināt projektu">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);" title="Dzēst projektu" class="action-icon text-danger"
                                               onclick="if(confirm('Vai tiešām izdzēsīsit šo projektu?')){$(this).find('form').submit();}">
                                                <i class="mdi mdi-delete"></i>
                                                <form action="{{ route('projects.delete', $project->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach()
                                </tbody>
                            </table>

                            <div class="mt-2 text-center">
                                {{ $projects->links() }}
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card-body" >
                        <div class="row mb-2">
                            <div class="text-center">
                                <p class="text-danger">Protokoli not created yet!</p>
                                <a href="{{ route('projects.create') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> Jauns Projekts
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        (function ($) {
            $( ".projectGallery" ).each(function( index ) {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}
                });
            });
        })(jQuery);
    </script>
@endsection
