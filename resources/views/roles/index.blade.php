@extends('layouts.app')
@section('content')
    @include('url')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-dark">Roles</h6>
                </div>
                <div class="col-md-6">
                    <div class="btn btn-danger text-white float-right">
                        <a href="javascript:void()" class="text-decoration-none text-white" data-toggle="modal" data-target="#registerRole" aria-expanded="false" aria-label="Toggle navigation"> New Role <span><i class="fa fa-plus"></i></span> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Date Registered</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Date Registered</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($roles as $index=>$role)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $role->role_name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="javascript:void()" class="text-decoration-none"><i class="fa fa-eye text-primary"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:void()" data-target="#editRole{{ $role->id }}" data-toggle="modal" class="text-decoration-none" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-edit text-primary"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <form action="" method="POST" id="delete_role">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{ $role->id }}" class="form-control" placeholder="">
                                                <button type="submit" class="delete_role btn btn-white text-decoration-none"><i class="fa fa-trash text-danger"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @include('modal.editRole')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('modal.registerRole')
@endsection
