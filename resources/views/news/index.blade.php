@extends('layouts.app')
@section('content')
    <div class="container">
        <button class="float-right btn btn-danger" data-target="#news_and_update" data-toggle="modal" aria-hidden="false">Add New <i class="fa fa-plus"></i></button>
        <div class="row">
            @foreach ($get_news as $get_new)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <p>{{ $get_new->new_title }}</p>
                        </div>
                        <div class="card-body">
                            <a href="javascript:void()" data-target="#image_preview" data-toggle="modal" aria-hidden="false">
                                <img src="{{ asset('image/'.$get_new->new_postacl_card) }}" alt="post-card" width="100%" height="100%">
                            </a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="javascript:void()" class="text-decoration-none">publish</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:void()" data-target="#editRole" data-toggle="modal" class="text-decoration-none" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-edit text-primary"></i></a>
                                </div>
                                <div class="col-md-4">
                                    <form action="" method="POST" id="delete_role">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="" class="form-control" placeholder="">
                                        <button type="submit" class="delete_role btn btn-white text-decoration-none"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('modal.new_and_update')
@endsection
