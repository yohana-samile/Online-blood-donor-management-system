@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        @if (Auth::User()->role_id != 3)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Enjoy by using left Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }} {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
            </div>
        @else
            @php
                $group_A_result = DB::select("SELECT COUNT(blood_donation_records.user_id) AS blood_donation_records FROM blood_donation_records JOIN users ON blood_donation_records.user_id = users.id JOIN profiles ON users.id = profiles.user_id JOIN blood_groups ON profiles.blood_group_id = blood_groups.id WHERE blood_groups.bloodGroup = 'A+'");
                $group_A = isset($group_A_result[0]->blood_donation_records) ? $group_A_result[0]->blood_donation_records : 0;

                // b

                $group_B_result = DB::select("SELECT COUNT(blood_donation_records.user_id) AS blood_donation_records FROM blood_donation_records JOIN users ON blood_donation_records.user_id = users.id JOIN profiles ON users.id = profiles.user_id JOIN blood_groups ON profiles.blood_group_id = blood_groups.id WHERE blood_groups.bloodGroup = 'B+'");
                $group_B = isset($group_B_result[0]->blood_donation_records) ? $group_B_result[0]->blood_donation_records : 0;

                // o
                $group_O_result = DB::select("SELECT COUNT(blood_donation_records.user_id) AS blood_donation_records FROM blood_donation_records JOIN users ON blood_donation_records.user_id = users.id JOIN profiles ON users.id = profiles.user_id JOIN blood_groups ON profiles.blood_group_id = blood_groups.id WHERE blood_groups.bloodGroup = 'O+'");
                $group_O = isset($group_O_result[0]->blood_donation_records) ? $group_O_result[0]->blood_donation_records : 0;
            @endphp
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-with-border">
                        <div class="card-header">Blood Group A+</div>
                        <div class="card-body">
                            <h4 class="card-title">Ltr</h4>
                            <p class="card-text">{{ $group_A }}.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-with-border">
                        <div class="card-header">Blood Group B+</div>
                        <div class="card-body">
                            <h4 class="card-title">Ltr</h4>
                            <p class="card-text">{{ $group_B }}.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-with-border">
                        <div class="card-header">Blood Group O+</div>
                        <div class="card-body">
                            <h4 class="card-title">Ltr</h4>
                            <p class="card-text">{{ $group_O }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
