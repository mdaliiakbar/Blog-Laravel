@extends('layouts.app')
@section('title','Trash')
@section("style")
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section("script")
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
	
	$(document).ready(function(){

	});

	function confirmation(text){
		if(confirm(text)){
			return true;
		} return false;
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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Trash</a></li>
								<li class="breadcrumb-item active">Blog Manger</li>
							</ol>
						</div>
						<h4 class="page-title">@yield("title")</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-12">
					@if(session()->has('msg'))
					<div class="card-box">						
						<div class="alert alert-success">
							{{ session()->get('msg') }}
						</div>						
					</div> <!-- end card-box -->
					@endif
					<div class="card-box">
						<table id="studentList" class="table table-bordered dt-responsive nowrap">
							<thead>
							<tr>
								<th style="width: 5%" class="text-center">#</th>
								<th style="width: 50%">Title</th>
								<th style="width: 15%" class="text-center">Post At</th>
								<th style="width: 15%" class="text-center">Delete At</th>
								<th style="width: 10%" class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
								@if(count($news)>0)
								@foreach ($news as $key=>$item)
								<tr>
									<td class="text-center">{{ $key+1 }} </td>
									<td>
										<div class="badge badge-primary">{{ $item->category->title }}</div>
										{{ $item->title }} 
									</td>
									<td class="text-center">{{ $item->news_date }} </td>
									<td class="text-center">{{ $item->deleted_at }} </td>
									<td class="text-center"> 
										<form style="display:inline;" action="{{ route("news-del-forever") }}" method="post" onsubmit="return confirmation('Are you sure to delete forever?')">
											{{ csrf_field() }}
											<input type="hidden" name="id" value="{{ $item->id }}">
											<div class="btn-group">
												<a title="Restore" data-toggle="tooltip" data-placement="top" href="{{ route("news-restore",$item->id) }}" class="fa fa-retweet btn btn-sm btn-primary"  onclick="return confirmation('Are you sure to restore?')"></a> 
												<button title="Delete Forever" data-toggle="tooltip" data-placement="top" type="submit" class="fa fa-trash btn btn-sm btn-danger"></button> 
											</div>
										</form>
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td class="text-center" colspan="5">No data found!</td>
								</tr>
								@endif
								
							</tbody>
						</table>
					</div> <!-- end card-box -->
				</div> <!-- end col -->
			</div> <!-- end row -->


		</div> <!-- container-fluid -->

	</div> <!-- content -->


@endsection

