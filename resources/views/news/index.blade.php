@extends('layouts.app')
@section('content')
    <div class="container">
        <button class="float-right btn btn-danger" data-target="#news_and_update" data-toggle="modal" aria-hidden="false">Add New <i class="fa fa-plus"></i></button>
        @if (!empty($get_news))
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
                                    <div class="col-md-6">
                                        @if ($get_new->publish_status == 0)
                                            <form action="" method="POST" id="publish_new">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{ $get_new->id }}" class="form-control" placeholder="">
                                                <button type="submit" class="publish_new btn btn-white text-primary text-decoration-none">publish</button>
                                            </form>
                                        @else
                                            <p class="badge badge-primary">Published</p>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <a href="javascript:void()" data-target="#editNewTitle{{ $get_new->id }}" data-toggle="modal" class="text-decoration-none" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-edit text-primary"></i></a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="" method="POST" id="delete_new">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{ $get_new->id }}" class="form-control" placeholder="">
                                            <button type="submit" class="delete_new btn btn-white text-decoration-none"><i class="fa fa-trash text-danger"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <br>
            <p class="alert alert-danger my-4">No Records</p>
        @endif
    </div>
    @include('modal.new_and_update')
@endsection
