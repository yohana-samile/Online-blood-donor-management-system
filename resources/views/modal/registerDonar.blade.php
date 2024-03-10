<div class="modal fade" id="registerDonar" tabindex="-1" aria-labelledby="registerDonar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerDonar">{{('Register new blood donar')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="register_new_donor">
                <div class="loader" style="display: none;"></div>
                @csrf
                <div class="mb-3">
                    <label for="regstrationFull_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="regstrationFull_name" name="regstrationFull_name">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" pattern="[1-9][0-9]{8}" title="Please enter a valid phone number without leading zeros or +255">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="registrationEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="registrationEmail" id="registrationEmail" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><small>We'll never share your email with anyone</small></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option selected hidden disabled>Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            @php
                                $get_blood_group = DB::select("SELECT * FROM `blood_groups`");
                            @endphp
                            <select name="blood_group" id="blood_group" class="form-control">
                                <option selected hidden disabled>Choose Blood Group</option>
                                    @if (!empty($get_blood_group))
                                    @foreach ($get_blood_group as $get_blood_groups)
                                        <option value="{{ $get_blood_groups->id }}">{{ $get_blood_groups->bloodGroup }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <p>Residence</p>
                    <div class="col-md-6">
                        <div class="mb-3">
                            @php
                                $get_donor_region = DB::select("SELECT * FROM `regions`");
                                // $role = DB::table('roles')->where('role_name', 'donor')->first();
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
                <button type="submit" class="btn btn-danger">{{("Register")}}</button>
            </form>
        </div>
    </div>
</div>
