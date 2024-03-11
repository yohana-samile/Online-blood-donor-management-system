
{{-- view hospital --}}
<div class="modal fade" id="viewHospital{{ $record->id }}" tabindex="-1" aria-labelledby="viewHospital{{ $record->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{('Hospital Name:')}} {{ $record->name }}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form id="send_sms_notification">
                    @csrf
                    <div class="loader" style="display: none;"></div>
                        <div class="modal-body">
                            <div class="row">
                                <p>Located At</p>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Region</label>
                                        <input type="text" class="form-control" value="{{ $record->region }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">District</label>
                                        <input type="text" class="form-control" value="{{ $record->district }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Ward</label>
                                        <input type="text" class="form-control" value="{{ $record->ward }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
