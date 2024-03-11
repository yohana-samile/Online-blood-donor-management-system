@extends('layouts.app')
@section('content')
    {{-- @include('url') --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Donation Records Registered</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Donation Date</th>
                            <th>Status</th>
                            <th>Perfomed_by_you</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Donation Date</th>
                            <th>Status</th>
                            <th>Perfomed_by_you</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @if(!empty($records))
                            @foreach ($records as $index => $record)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $record->date_donate }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td class="text-center"><i class="fa fa-check text-primary"></i></td>
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
