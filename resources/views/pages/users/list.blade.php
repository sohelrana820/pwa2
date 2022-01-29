@extends('layouts.main')

@section('title')
    Lietotāji
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sākums</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lietotāji</a></li>
                </ol>
            </div>
            <h4 class="page-title">Lietotāji</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2 justify-content-between">
                    <div class="col-sm-4">
                        <a href="{{ route('users.create') }}" class="btn btn-danger mb-2">
                            <i class="mdi mdi-plus-circle me-2"></i> Pievienot lietotāju
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-sm-end">
                            <form method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Meklēt" name="q" aria-label="Meklēt" value=" {{request()->query('q') ?? ''}}">
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
                            <th>Vārds</th>
                            <th>Uzvārds</th>
                            <th>Epasts</th>
                            <th>Loma</th>
                            <th>Status</th>
                            <th>Izveidots</th>
                            <th>Atjaunināts</th>
                            <th style="width: 85px;">Meklēt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ ucwords($user->first_name) }}</td>
                                <td>{{ ucwords($user->last_name) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucwords($user->userRole->role->role_name) }}</td>
                                <td>
                                    @if ($user->active_status == 1)
                                        <span class="badge bg-success">Aktīvs</span>
                                    @elseif ($user->active_status == 2)
                                        <span class="badge bg-danger">Neaktīvs</span>
                                    @endif
                                </td>
                                <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                                <td>{{ date('d M, Y', strtotime($user->updated_at)) }}</td>
                                <td class="table-action">
                                    <a href="{{ route('users.create', ['id' => $user->id]) }}" class="action-icon text-primary" title="Atjaunināt lietotāju">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0);" title="Dzēst lietotāju" class="action-icon text-danger"
                                       onclick="if(confirm('Vai tiešām izdzēsīsit šo lietotāju?')){$(this).find('form').submit();}">
                                        <i class="mdi mdi-delete"></i>
                                        <form action="{{ route('users.delete', $user->id) }}" method="post">
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>

<!--    <script type="text/javascript">
        var tableId = '#product-datatable'; // Table selector

        $(document).ready(function() {
            // Filter table
            var table = $(tableId).DataTable( {
                paging: true,
                serverSide: false,
                pageLength: 100,
            });
        });
    </script>-->
@endsection
