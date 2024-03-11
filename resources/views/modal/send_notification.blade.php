<div class="modal fade" id="send_notification" tabindex="-1" aria-labelledby="send_notification" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                @php
                    $total_donors = DB::table('users')->count();
                @endphp
                <h5 class="modal-title">{{('Send SmS notification To All')}} <span class="badge badge-primary">{{ $total_donors }}</span> {{('Donaors')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form id="send_sms_notification">
                    @csrf
                    <div class="loader" style="display: none;"></div>
                    <div class="modal-body">
                        <p>Where Donation Will Conducted</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @php
                                        $get_donor_region = DB::select("SELECT * FROM `regions`");
                                    @endphp
                                    <label for="region" class="form-label">Region</label>
                                    <select name="region_to_be_conducted" id="region" class="form-control">
                                        <option selected hidden disabled>Choose Region</option>
                                        @foreach ($get_donor_region as $get_donor_regions)
                                            <option value="{{ $get_donor_regions->name }}">{{ $get_donor_regions->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district" class="form-label">District</label>
                                    <select name="district_to_be_conducted" id="district" class="form-control" disabled>
                                        <option selected hidden disabled>Choose District</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ward" class="form-label">Ward</label>
                                    <select name="ward_to_be_conducted" id="ward" class="form-control" disabled>
                                        <option selected hidden disabled>Choose Ward</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="street" class="form-label">Street</label>
                                    <select name="street_to_be_conducted" id="street" class="form-control" disabled>
                                        <option selected hidden disabled>Choose Street</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time_to_be_conducted">time to be conducted"</label>
                            <input type="datetime-local" name="time_to_be_conducted" id="time_to_be_conducted" placeholder="time to be conducted" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sms_notification">Enter SmS For Notification</label>
                            <textarea name="sms_notification" id="sms_notification" class="form-control" cols="10" rows="10" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                        <button type="submit" class="btn btn-danger float-right">{{('send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
