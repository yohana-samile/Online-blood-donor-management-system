@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-dark">Blood Groups</h6>
                </div>
                <div class="col-md-6">
                    <div class="btn btn-danger text-white float-right">
                        <a href="javascript:void()" class="text-decoration-none text-white" data-toggle="modal" data-target="#registerBloodGroup" aria-expanded="false" aria-label="Toggle navigation"> New Blood Group <span><i class="fa fa-plus"></i></span> </a>
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
                            <th>Blood Group Name</th>
                            <th>Group Info</th>
                            <th>Date Registered</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Blood Group Name</th>
                            <th>Group Info</th>
                            <th>Date Registered</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($blood_groups as $index=>$blood_group)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $blood_group->bloodGroup }}</td>
                                <td>{{ $blood_group->bloodGroupInfo }}</td>
                                <td>{{ $blood_group->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="javascript:void()" class="text-decoration-none"><i class="fa fa-eye text-primary"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:void()" data-target="#editBloodGroup{{ $blood_group->id }}" data-id="{{ $blood_group->id }}" data-toggle="modal" class="text-decoration-none" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-edit text-primary"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="delete_blood_group" data-id="{{ $blood_group->id }}" class="btn btn-white"><i class="fa fa-trash text-danger"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('modal.editBloodGroup')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('modal.registerBloodGroup')
@endsection
