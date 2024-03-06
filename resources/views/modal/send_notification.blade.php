<div class="modal fade" id="send_notification" tabindex="-1" aria-labelledby="send_notification" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @php
                    $total_donors = DB::table('users')->count();
                @endphp
                <h5 class="modal-title">{{('Send SmS notification To All')}} <span class="badge badge-primary">{{ $total_donors }}</span> {{('Donaors')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="send_sms_notification">
                @csrf
                <div class="loader" style="display: none;"></div>
                <div class="modal-body">
                    <p>Where Donation Will Conducted</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                @php
                                    $get_donor_region = DB::select("SELECT * FROM `regions`");
                                @endphp
                                <label for="region" class="form-label">Region</label>
                                <select name="region" id="region" class="form-control">
                                    <option selected hidden disabled>Choose Region</option>
                                    @foreach ($get_donor_region as $get_donor_regions)
                                        <option value="{{ $get_donor_regions->name }}">{{ $get_donor_regions->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <select name="district" id="district" class="form-control" disabled>
                                    <option selected hidden disabled>Choose District</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ward" class="form-label">Ward</label>
                                <select name="ward" id="ward" class="form-control" disabled>
                                    <option selected hidden disabled>Choose Ward</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="street" class="form-label">Street</label>
                                <select name="street" id="street" class="form-control" disabled>
                                    <option selected hidden disabled>Choose Street</option>
                                </select>
                                {{-- <input type="hidden" value="{{ $role->id }}" name="role" id="role"> --}}
                                <input type="hidden" name="places" id="placereturnedfromstreetselection">

                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message_replay">Enter SmS For Notification</label>
                        <textarea name="message_replay" id="message_replay" class="form-control" placeholder="Enter SmS For Notification" cols="10" rows="10"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{('send')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
