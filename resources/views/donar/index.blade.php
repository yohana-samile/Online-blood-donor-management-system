@extends('layouts.app')
@section('content')
    @include('url')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-dark"> Notify Donars About Donation</h6>
                    <button data-target="#send_notification" data-toggle="modal" class="btn btn-sm btn-dark text-white">Noty <i class="fa fa-envelope"></i></button>
                </div>
                <div class="col-md-6">
                    <div class="btn btn-danger text-white float-right">
                        <a href="javascript:void()" class="text-decoration-none text-white" data-toggle="modal" data-target="#registerDonar" aria-expanded="false" aria-label="Toggle navigation"> New Donar + </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Bloode Group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Bloode Group</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($profiles as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>+255{{ $user->phone_number }}</td>
                                <td class="text-capitalize text-center">{{ $user->blood_group->bloodGroup }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="javescript:void()" data-target="#viewUser{{ $user->id }}" data-toggle="modal"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javescript:void()" class="text-decoration-none text-warning"><i class="fa fa-edit"></i></a>
                                        </div>
                                            <div class="col-md-4">
                                                <a href="javescript:void()" class="text-decoration-none text-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @include('modal.viewEditUserInfo')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal -->
    @include('modal.registerDonar')
    @include('modal.send_notification')
@endsection
