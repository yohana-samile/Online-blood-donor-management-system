@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <form id="updateResidence">
            <div class="loader" style="display: none;"></div>
            @csrf
            <div class="mb-3">
                <label for="regstrationFull_name" class="form-label">Full Name</label>
                <input type="hidden" class="form-control" id="id" value="{{ $my_profile->id }}" name="id">
                <input type="text" class="form-control" id="regstrationFull_name" value="{{ $my_profile->name }}" name="regstrationFull_name">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" value="{{ $my_profile->profile->phone_number }}" class="form-control" pattern="[1-9][0-9]{8}" title="Please enter a valid phone number without leading zeros or +255">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="registrationEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="registrationEmail" value="{{ $my_profile->email }}" disabled id="registrationEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"><small>We'll never share your email with anyone</small></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option selected hidden disabled>{{ $my_profile->profile->gender }}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label for="blood_group" class="form-label">Blood Group</label>
                        <input type="blood_group" class="form-control" name="blood_group" value="{{ $my_profile->bloodGroup->bloodGroup }}" disabled id="blood_group">
                    </div>
                </div> --}}
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
            <button type="submit" class="btn btn-success">{{("Update")}}</button>
        </form>
    </div>
@endsection
