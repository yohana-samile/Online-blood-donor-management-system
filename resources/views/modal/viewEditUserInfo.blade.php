<div class="modal fade" id="viewUser{{ $user->id }}" tabindex="-1" aria-labelledby="viewUser{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{('Donator Name:')}} {{ $user->user->name }}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="send_sms_notification">
                @csrf
                <div class="loader" style="display: none;"></div>
                    <div class="modal-body">
                        <div class="row">
                            <p>Home Residence</p>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Region</label>
                                    <input type="text" class="form-control" value="{{ $user->region }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">District</label>
                                    <input type="text" class="form-control" value="{{ $user->district }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Ward</label>
                                    <input type="text" class="form-control" value="{{ $user->ward }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Street</label>
                                    <input type="text" class="form-control" value="{{ $user->street }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Personal Details</p>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Gender</label>
                                    <input type="text" class="form-control" value="{{ $user->gender }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Age</label>
                                    <input type="text" class="form-control" value="{{ $user->age }}" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

