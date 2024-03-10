@extends('layouts.app')
@section('content')
    @include('url')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-dark">Hospital Registered</h6>
                </div>
                <div class="col-md-6">
                    <div class="btn btn-danger text-white float-right">
                        <a href="javascript:void()" class="text-decoration-none text-white" data-toggle="modal" data-target="#registerDonar" aria-expanded="false" aria-label="Toggle navigation"> New Hospital + </a>
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
                            <th>Hospital Name</th>
                            <th>Hospital Email</th>
                            <th>Hospital Phone Number</th>
                            <th>Adrress</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Hospital Name</th>
                            <th>Hospital Email</th>
                            <th>Hospital Phone Number</th>
                            <th>Adrress</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @if(!empty($hospitalRecord))
                            @foreach ($hospitalRecord as $index => $record)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $record->user->name }}</td>
                                    <td>{{ $record->user->email }}</td>
                                    <td>+255{{ $record->phone_number }}</td>
                                    <td class="text-capitalize text-center">{{ $record->address }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="javescript:void()" data-target="#viewUser{{ $record->id }}" data-toggle="modal"><i class="fa fa-eye"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javescript:void()" class="text-decoration-none text-warning"><i class="fa fa-edit"></i></a>
                                            </div>
                                                <div class="col-md-4">
                                                    <a href="javescript:void()" class="text-decoration-none text-danger"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @include('modal.viewEditUserInfo') --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('modal.registerHospital')
@endsection
