@extends('layouts.app')
@section('content')
    <div class="container">
        @include('url')
        <div class="tab">
            <button class="tablinks" onclick="openLocation(event, 'all_location')">All Location</button>
            <button class="tablinks" onclick="openLocation(event, 'districts')">districts</button>
            <button class="tablinks" onclick="openLocation(event, 'regions')">regions</button>
            <button class="tablinks" onclick="openLocation(event, 'wards')">Wards</button>
            <button class="tablinks" onclick="openLocation(event, 'ward_streets_places')">ward_streets_places</button>
        </div>

        {{-- all_location --}}
        <div id="all_location" class="tabcontent">
            <div class="row">
                <div class="col-md-6">
                    <p>Location</p>
                </div>
                <div class="col-md-6">
                    <button data-toggle="modal" data-target="#locations" class="btn btn-danger btn-sm">Import Cv Location <i class="fa fa-download" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>


        {{-- districts --}}
        <div id="districts" class="tabcontent">
            <div class="row">
                <div class="col-md-6">
                    <p>Districts</p>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-sm">Import Cv Districts <i class="fa fa-download" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>


         {{-- regions --}}
         <div id="regions" class="tabcontent">
            <div class="row">
                <div class="col-md-6">
                    <p>Location</p>
                </div>
                <div class="col-md-6">
                    <button data-toggle="modal" data-target="#regionsModal"  class="btn btn-danger btn-sm">Import Cv Regions <i class="fa fa-download" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>

        {{-- wards --}}
        <div id="wards" class="tabcontent">
            <div class="row">
                <div class="col-md-6">
                    <p>Location</p>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-sm">Import Cv Wards <i class="fa fa-download" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>


        {{-- ward_streets_places --}}
        <div id="ward_streets_places" class="tabcontent">
            <div class="row">
                <div class="col-md-6">
                    <p>Location</p>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-sm">Import Cv Streets <i class="fa fa-download" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>

        @include('modal.locations')
    </div>
@endsection
