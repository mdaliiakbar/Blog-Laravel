@extends('layouts.app')
@section('title','Add News & Events')

@section("script")
    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <!-- validation init -->
    <script src="assets/js/pages/form-validation.init.js"></script>
    <script>
          var id;
        $(document).ready(function(){


        });
    </script>
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">News & Events</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                        <h4 class="page-title">@yield('title')</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row saveForm" >
                <div class="col-lg-12">

                    <div class="card-box">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="text-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        @if(session()->has('msg'))
                            <div class="alert alert-success">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
                        <form method="post" class="parsley-examples" action="{{ route("add-news") }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="1" name="save">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" parsley-trigger="change" required name="title" class="form-control" id="title" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select id="category" name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="news_date">Date <span class="text-danger">*</span></label>
                                    <input type="date" name="news_date" class="form-control" parsley-trigger="change" value="{{ date("Y-m-d") }}" required id="news_date" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="body">Description <span class="text-danger">*</span></label>
                                    <textarea name="body" parsley-trigger="change" class="form-control" id="body" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="picture">Picture <span class="text-danger">*</span></label>
                                    <input type="file"  name="picture[]" id="picture">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Tags </label>
                                    @foreach($tags as $row)
                                        <label><input type="checkbox" name="tag[]" value="{{ $row->id }}"> {{ $row->title }} </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Type</label>
                                    <label><input type="radio"  name="news_type" value="1" checked> News </label>
                                    <label><input type="radio"  name="news_type" value="2"> Events</label>
                                </div>
                                <div class="col-md-3">
                                    <label>Status</label>
                                    <label><input type="radio"  name="news_status" value="1"> Published </label>
                                    <label><input type="radio"  name="news_status" value="2" checked> Draft</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Created by: {{ auth()->user()->name }} </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center" style="margin-top: 20px;">
                                    <button value="1" class="btn btn-primary waves-effect waves-light mr-1" name="save" type="submit">
                                        <i class="fa fa-save"></i>  Save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number]{
            -moz-appearance: textfield;
        }
        input,select,textarea{
            margin-bottom: 8px;
        }
    </style>

@endsection
