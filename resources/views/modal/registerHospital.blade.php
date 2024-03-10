<div class="modal fade" id="registerDonar" tabindex="-1" aria-labelledby="registerDonar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerDonar">{{('Register new blood donar')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="register_new_hospital">
                <div class="loader" style="display: none;"></div>
                @csrf
                <div class="mb-3">
                    <label for="hospitalFull_name" class="form-label">Hospital Full Name</label>
                    <input type="text" class="form-control" id="hospitalFull_name" name="hospitalFull_name">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hospitalphoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" name="hospitalphoneNumber" id="hospitalphoneNumber" class="form-control" pattern="[1-9][0-9]{8}" title="Please enter a valid phone number without leading zeros or +255">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hospitalEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="hospitalEmail" id="hospitalEmail">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <p>Located At</p>
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
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Adress" required>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-danger">{{("Register Hospital")}}</button>
            </form><br>
        </div>
    </div>
</div>
