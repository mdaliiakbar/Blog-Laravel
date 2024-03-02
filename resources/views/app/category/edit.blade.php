@extends('layouts.app')
@section('title','Update Category')

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
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
                        <form method="post" class="parsley-examples" action="{{ route("add-category") }}"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $cat->id }}" name="id"/>
                            <input type="hidden" value="2" name="save"/>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" required name="title" class="form-control" value="{{ $cat->title }}" id="title" autocomplete="off">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="body">Description <span class="text-danger">*</span></label>
                                        <textarea name="body" class="form-control" id="body">{{ $cat->details }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Status</label>
                                        <label><input type="radio"  name="status" value="1" @if($cat->status==1)checked @endif> Published </label>
                                        <label><input type="radio"  name="status" value="2" @if($cat->status==2)checked @endif> Draft</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center" style="margin-top: 20px;">
                                        <button value="1" class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                            <i class="fa fa-save"></i>  Update
                                        </button>
                                        <a href="{{ route("category") }}" class="btn btn-danger waves-effect waves-light mr-1" >
                                            <i class="fa fa-times"></i>  Cancel
                                        </a>
                                    </div>
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
