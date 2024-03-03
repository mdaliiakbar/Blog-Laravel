@extends('layouts.app')
@section('title','Update News & Events')

@section("script")
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <!-- validation init -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    <script src="{{ asset('assets/js/pages/spartan-multi-image-picker.js')}}"></script>
    <script>
         var count = 0;
          var id;
          var sl="{{ $news->picture }}";
          sl= sl.split(",");
          sl=sl.length;
          var trashImg=[],  trashThum=[];
          var newAdd=-1;
        $(document).ready(function(){
            count = sl+1; 
            $("#demo").spartanMultiImagePicker({
                fieldName:  'picture[]',
                //dropFileLabel:   'Drop file here',
                allowedExt:'png|jpg|jpeg|gif|webp',
                onAddRow: function() {
                    newAdd++;
                 $("#imageNewAdd").val(newAdd);
                },
                onRemoveRow: function() {
                    if(newAdd>0){
                        newAdd--;
                        $("#imageNewAdd").val(newAdd);
                    }                    
                },
            });
        });

        function deleteFIle(img,thum){
            trashImg.push(img);
            trashThum.push(thum);
            $("#trashImg").val(trashImg.join(","));
            $("#trashThum").val(trashThum.join(","));
        }

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
                        <form method="post" class="parsley-examples" action="{{ route("add-news") }}"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $news->id }}" name="id"/>
                            <input type="hidden" value="2" name="save"/>
                            <input type="hidden"  name="trashImg" id="trashImg"/>
                            <input type="hidden"  name="trashThum" id="trashThum"/>
                            <input type="hidden"  name="imageNewAdd" id="imageNewAdd" value="2"/>
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text"  name="title" class="form-control" value="{{ $news->title }}" id="title" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select id="category" name="category_id" class="form-control">
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}" @if($news->category_id==$row->id) selected @endif>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="news_date">Date <span class="text-danger">*</span></label>
                                    <input type="date" name="news_date" class="form-control" parsley-trigger="change" value="{{ $news->news_date }}" required id="news_date" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="body">Description <span class="text-danger">*</span></label>
                                    <textarea name="body" parsley-trigger="change" class="form-control" id="body">{{ $news->body }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Tags </label>
                                    @foreach($tags as $row)
                                        <label><input type="checkbox" name="tag[]" value="{{ $row->id }}" @if($news->tag_id) @if(in_array($row->id,explode(",",$news->tag_id))) checked @endif @endif> {{ $row->title }} </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Type</label>
                                    <label><input type="radio"  name="news_type" value="1" @if($news->news_type==1)checked @endif> News </label>
                                    <label><input type="radio"  name="news_type" value="2" @if($news->news_type==2)checked @endif> Events</label>
                                </div>
                                <div class="col-md-3">
                                    <label>Status</label>
                                    <label><input type="radio"  name="news_status" value="1" @if($news->news_status==1)checked @endif> Published </label>
                                    <label><input type="radio"  name="news_status" value="2" @if($news->news_status==2)checked @endif> Draft</label>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="meta">Meta</label>
                                    <textarea name="meta" class="form-control" id="meta">{{ $news->meta }}</textarea>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="picture">Picture (png/jpg/jpeg/gif/webp) <span class="text-danger">*</span></label>
                                    <div id="demo" class="row">
                                        @if($news->picture)
                                        @foreach (explode(",",$news->picture) as $key=>$item)
                                        <div class="col-md-4 col-sm-4 col-xs-6 spartan_item_wrapper" data-spartanindexrow="{{ $key+1}}" style="margin-bottom : 20px; ">
                                            <div style="position: relative;">
                                                <div class="spartan_item_loader" data-spartanindexloader="{{ $key+1}}" style=" position: absolute; width: 100%; height: 200px; background: rgba(255,255,255, 0.7); z-index: 22; text-align: center; align-items: center; margin: auto; justify-content: center; flex-direction: column; display : none; font-size : 1.7em; color: #CECECE">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                    </svg>
                                                </div>
                                                <label class="file_upload" style="width: 100%; height: 200px; border: 2px dashed #ddd; border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; padding: 5px; margin-top: 5px; margin-bottom : 5px; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;">
                                                    <a href="javascript:void(0)" onclick="deleteFIle('{{ $item }}','{{ explode(',', $news->thumbnail)[$key] }}')" data-spartanindexremove="{{ $key+1}}" style="position: absolute !important; right : 3px; top: 3px; display : block; background : #ED3C20; border-radius: 3px; width: 30px; height: 30px; line-height : 30px; text-align: center; text-decoration : none; color : #FFF;" class="spartan_remove_row">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </a>
                                                    <img style="width: 100%; margin: 0 auto; vertical-align: middle;" data-spartanindexi="{{ $key+1}}" src="{{ asset($item) }}" class="spartan_image_placeholder" /> 
                                                    <p data-spartanlbldropfile="{{ $key+1}}" style="color : #5FAAE1; display: none; width : auto; ">Drop file here</p>
                                                    <img style="width: 100%; vertical-align: middle; display:none;" class="img_" data-spartanindeximage="{{ $key+1}}">
                                                    <input class="form-control spartan_image_input" accept="image/*" data-spartanindexinput="{{ $key+1}}" style="display : none"  name="picture[]" type="file">
                                               </label> 
                                            </div>
                                       </div>
                                        @endforeach
                                        @endif
                                    </div>

                                    {{-- 
                                    @if($news->thumbnail)
                                    @if(file_exists(public_path($news->thumbnail)))
                                    <div>
                                        <img src="{{ $news->thumbnail }}">
                                    </div>
                                    @endif
                                    @endif
                                    <input type="file"  name="picture[]" id="picture" multiple> --}}
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 text-center" style="margin-top: 20px;">
                                    <button value="1" class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                        <i class="fa fa-save"></i>  Update
                                    </button>
                                    <a href="{{ route("news") }}" class="btn btn-danger waves-effect waves-light mr-1" >
                                        <i class="fa fa-times"></i>  Cancel
                                    </a>
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
