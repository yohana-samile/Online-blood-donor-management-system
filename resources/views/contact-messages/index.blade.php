@extends('layouts.app')
@section('content')
    <div class="container">
        @if (!empty($get_user_query))
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sender Name</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Time Sent</th>
                            <th>Readed</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Sender Name</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Time Sent</th>
                            <th>Readed</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($get_user_query as $index=>$query)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $query->full_name }}</td>
                                <td>{{ $query->phone_number }}</td>
                                <td>{{ $query->message }}</td>
                                <td>{{ $query->created_at }}</td>
                                <td>
                                    @if ($query->message_status == 1)
                                        True <i class="fa fa-check text-primary"></i>
                                    @else
                                        False
                                    @endif
                                </td>
                                <td>
                                <div class="row">
                                    @if ($query->message_status != 1)
                                        <div class="col-md-4">
                                            <a href="javascript:void()" data-target="#replayToNormalSmS{{ $query->id }}" data-toggle="modal" class="text-decoration-none"><i class="fa fa-envelope text-primary"></i></a>
                                        </div>
                                    @endif
                                    <div class="col-md-4">
                                        <button id="delete_query" data-id="{{ $query->id }}" class="btn btn-white"><i class="fa fa-trash text-danger"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('modal.replaySmS')
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-danger">Do Records</div>
        @endif
    </div>
@endsection

