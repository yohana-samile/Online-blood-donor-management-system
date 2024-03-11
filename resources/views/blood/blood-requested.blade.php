@extends('layouts.app')
@section('content')
    @include('url')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Blood Request Records</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Blood Group</th>
                            <th>Date Requested</th>
                            <th>Requested_by</th>
                            <th>Amount In ltr</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Blood Group</th>
                            <th>Date Requested</th>
                            <th>Requested_by</th>
                            <th>Amount In ltr</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @if(!empty($requestRecord))
                            @foreach ($requestRecord as $index => $record)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $record->bloodGroup }}</td>
                                    <td>{{ $record->date_requested }}</td>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->amountInLtr }}</td>
                                    <td>
                                        @if ($record->status == 'pending')
                                            <p class="badge badge-warning">Pending</p>
                                        @elseif ($record->status == 'complited')
                                            <p class="badge badge-primary">Accepted & Complited</p>
                                        @else
                                            <p class="badge badge-danger">denied</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            @if ($record->status == 'pending')
                                                <div class="col-md-6">
                                                    <form id="acceptRequest">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{ $record->id }}">
                                                        <button class="btn btn-sm btn-primary">Accept</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form id="denyRequest">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{ $record->id }}">
                                                        <button class="btn btn-sm btn-danger text-white">Deny</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
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
