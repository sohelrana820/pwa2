@extends('layouts.main')

@section('title')
    Users
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                </ol>
            </div>
            <h4 class="page-title">Users</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{ route('users.create') }}" class="btn btn-danger mb-2">
                            <i class="mdi mdi-plus-circle me-2"></i> Add User
                        </a>
                    </div>
<!--                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div>-->
                </div>
                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="product-datatable">
                        <thead class="table-light">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th style="width: 85px;">Action</th>
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
                                        <span class="badge bg-success">Active</span>
                                    @elseif ($user->active_status == 2)
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td class="table-action">
                                    <a href="{{ route('users.create', ['id' => $user->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="#" class="action-icon"> </a>
                                    <a href="javascript:void(0);" title="Delete User" class="action-icon"
                                       onclick="if(confirm('Are you sure to delete this user?')){$(this).find('form').submit();}">
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

    <script type="text/javascript">
        var tableId = '#product-datatable'; // Table selector

        $(document).ready(function() {
            // Filter table
            var table = $(tableId).DataTable( {
                paging: true,
                serverSide: false,
                pageLength: 100,
            });
        });
    </script>
@endsection
