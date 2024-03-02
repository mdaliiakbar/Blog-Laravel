@extends('layouts.app')
@section('title','New Password')

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Account Settings</a></li>
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
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="post" class="parsley-examples" action="{{ route("change-password") }}">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="current-password">Current Password <span class="text-danger">*</span></label>
                                    <input type="password"  name="current-password" class="form-control" id="current-password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="new-password">New Password <span class="text-danger">*</span></label>
                                    <input type="password"  name="new-password" class="form-control" id="new-password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="new-password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password"  name="new-password_confirmation" class="form-control" id="new-password_confirmation" required>

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
