@extends('layouts.app')
@section('content')
    @include('url')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-dark">Blood Request History</h6>
                </div>
                <div class="col-md-6">
                    <div class="btn btn-danger text-white float-right">
                        <a href="javascript:void()" class="text-decoration-none text-white" data-toggle="modal" data-target="#request" aria-expanded="false" aria-label="Toggle navigation"> New Request + </a>
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
                            <th>Blood Group</th>
                            <th>Date Requested</th>
                            <th>Amount In ltr</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Blood Group</th>
                            <th>Date Requested</th>
                            <th>Amount In ltr</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @if(!empty($requestRecord))
                            @foreach ($requestRecord as $index => $record)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $record->date_requested }}</td>
                                    <td>{{ $record->bloodGroup }}</td>
                                    <td>{{ $record->amountInLtr }}</td>
                                    <td>
                                        @if ($record->status == 'pending')
                                            <p class="badge badge-warning">Pending</p>
                                        @elseif ($record->status == 'complited')
                                            <p class="badge badge-primary">complited</p>
                                        @else
                                            <p class="badge badge-danger">denied</p>
                                        @endif
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
    @include('modal.sendBloodRequest')
@endsection
