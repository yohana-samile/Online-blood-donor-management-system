@extends('layouts.app')
@section('content')
    @include('url')
    <div class="container">
        <h5 class="modal-title" id="registerDonar">{{('Register new blood donar')}}</h5>
        <hr class="bg-danger">
        <form id="register_new_donor">
            <div class="loader" style="display: none;"></div>
            @csrf
            <div class="form-group">
                <label for="regstrationFull_name" class="form-label">{{__('Full Name')}}</label>
                <input type="text" class="form-control" id="regstrationFull_name" name="regstrationFull_name">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber" class="form-label">{{__('Phone Number')}}</label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" pattern="[1-9][0-9]{8}" title="Please enter a valid phone number without leading zeros or +255">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="registrationEmail" class="form-label">{{__('Email address')}}</label>
                        <input type="email" class="form-control" name="registrationEmail" id="registrationEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"><small>{{__("We'll never share your email with anyone")}}</small></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender" class="form-label">{{__('Gender')}}</label>
                        <select name="gender" id="gender" class="form-control">
                            <option selected hidden disabled>{{__('Choose Gender')}}</option>
                            <option value="male">{{__('Male')}}</option>
                            <option value="female">{{__('Female')}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="blood_group" class="form-label">{{__('Blood Group')}}</label>
                        @php
                            $get_blood_group = DB::select("SELECT * FROM `blood_groups`");
                        @endphp
                        <select name="blood_group" id="blood_group" class="form-control">
                            <option selected hidden disabled>{{__('Choose Blood Group')}}</option>
                                @if (!empty($get_blood_group))
                                @foreach ($get_blood_group as $get_blood_groups)
                                    <option value="{{ $get_blood_groups->id }}">{{ $get_blood_groups->bloodGroup }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <p>{{__('Residence')}}</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        @php
                            $get_donor_region = DB::select("SELECT * FROM `regions`");
                            // $role = DB::table('roles')->where('role_name', 'donor')->first();
                        @endphp
                        <label for="region" class="form-label">{{__('Region')}}</label>
                        <select name="region" id="region" class="form-control">
                            <option selected hidden disabled>{{__('Choose Region')}}</option>
                            @foreach ($get_donor_region as $get_donor_regions)
                                <option value="{{ $get_donor_regions->name }}">{{ $get_donor_regions->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="district" class="form-label">{{__('District')}}</label>
                        <select name="district" id="district" class="form-control" disabled>
                            <option selected hidden disabled>{{__('Choose District')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ward" class="form-label">{{__('Ward')}}</label>
                        <select name="ward" id="ward" class="form-control" disabled>
                            <option selected hidden disabled>{{__('Choose Ward')}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="street" class="form-label">{{__('Street')}}</label>
                        <select name="street" id="street" class="form-control" disabled>
                            <option selected hidden disabled>{{__('Choose Street')}}</option>
                        </select>
                        {{-- <input type="hidden" value="{{ $role->id }}" name="role" id="role"> --}}
                        <input type="hidden" name="places" id="placereturnedfromstreetselection">

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger float-right">{{("Register")}}</button>
        </form>
    </div>
@endsection
