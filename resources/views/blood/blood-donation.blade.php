@extends('layouts.app')
@section('content')
    @include('url')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-dark">Donation And Blood Records</h6>
                </div>
                <div class="col-md-6">
                    <div class="btn btn-danger text-white float-right">
                        <a href="javascript:void()" class="text-decoration-none text-white" data-toggle="modal" data-target="#donationRecord" aria-expanded="false" aria-label="Toggle navigation"> New Donation + </a>
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
                            <th>Donator Name</th>
                            <th>Blood Group</th>
                            <th>Date Donate</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Donator Name</th>
                            <th>Blood Group</th>
                            <th>Date Donate</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @if(!empty($donation_records))
                            @foreach ($donation_records as $index => $record)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-capitalize">{{ $record->name }}</td>
                                    <td class="text-uppercase">{{ $record->bloodGroup }}</td>
                                    <td>{{ $record->date_donate }}</td>
                                    <td>
                                        @if ($record->status == "unused")
                                            <p>
                                                <form id="updateSavedRecord">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $record->id }}">
                                                    <button class="badge badge-danger btn btn-white">unused</button>
                                                </form>
                                            </p>
                                        @else
                                            <p class="badge badge-primary">inuse</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javescript:void()" class="text-decoration-none text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <p><small>Every donator donate 1 ltr of blood in 3-months</small></p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('modal.donationRecord')
@endsection
