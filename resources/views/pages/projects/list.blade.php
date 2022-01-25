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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Projects</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php if($projects->count() > 0): ?>
                    <div class="card-body" >
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="{{ route('projects.create') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> New Project
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="product-datatable">
                                <thead class="table-light">
                                <tr>
                                    <th>Project ID</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td>{{ $project->updated_at }}</td>
                                        <td class="table-action text-end">
                                            <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            <a href="{{ route('projects.update', ['id' => $project->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="#" class="action-icon"> </a>
                                            <a href="javascript:void(0);" title="Delete Project" class="action-icon"
                                               onclick="if(confirm('Are you sure to delete this project?')){$(this).find('form').submit();}">
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
                                <p class="text-danger">Project not created yet!</p>
                                <a href="{{ route('projects.create') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> New Project
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
@endsection
