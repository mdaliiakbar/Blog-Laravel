@extends('layouts.app')
@section('title','Trash')
@section("style")


	<link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection
@section("script")

	<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

	<script>
		
		$(document).ready(function(){

		});

		function confirm_delete(){
			if(confirm("Are you sure to delete forever?")){
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
								<th class="text-center">#</th>
								<th>Title</th>
								<th class="text-center">Post At</th>
								<th class="text-center">Delete At</th>
								<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
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
										<form style="display:inline;" action="{{ route("news-del-forever") }}" method="post" onsubmit="return confirm_delete()">
											{{ csrf_field() }}
											<input type="hidden" name="id" value="{{ $item->id }}">
											<div class="btn-group">
												<a href="{{ route("news-restore",$item->id) }}" class="fa fa-retweet btn btn-sm btn-primary"> Restore</a> 
												<button type="submit" class="fa fa-trash btn btn-sm btn-danger"> Delete</button> 
											</div>
										</form>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div> <!-- end card-box -->
				</div> <!-- end col -->
			</div> <!-- end row -->


		</div> <!-- container-fluid -->

	</div> <!-- content -->


@endsection

