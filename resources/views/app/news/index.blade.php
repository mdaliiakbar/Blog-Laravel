@extends('layouts.app')
@section('title','News & Events')
@section("style")


	<link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection
@section("script")

	<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

	<script>
		var table;
		$(document).ready(function(){
			studentList();


		});

		function confirm_delete(){
			if(confirm("Are you sure to sent trash this?")){
				return true;
			} return false;
		}

		function studentList(){
			var filterData  = {
				filter_category   : $("#filter_category").val(),
				filter_status   : $("#filter_status").val(),
				filter_type   	: $("#filter_type").val()
			};

			table = $('#studentList').DataTable
			({
				"bAutoWidth": false,
				"destroy": true,
				"bProcessing": true,
				"serverSide": true,
				"responsive": false,
				"aaSorting": [[3, 'desc']],
				"scrollX": true,
				"scrollCollapse": true,
				"columnDefs": [
					{
						"targets": [5],
						"orderable": false
					}, {
						"targets": [0,3,4,5],
						className: "text-center"
					}],
				"ajax": {
					url: "{{ route('news_list') }}",
					type: "post",
					"data": {
						_token: "{{ csrf_token() }}",
						search: filterData
					},
					"aoColumnDefs": [{
						'bSortable': false
					}],

					"dataSrc": function (jsonData) {
						return jsonData.data;
					},
					error: function (request, status, error) {
						console.log(request.responseText);
						//toastr.warning('Server Error. Try aging!', 'Warning');
					}
				}
			});
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
								<li class="breadcrumb-item active">News & Events List</li>
							</ol>
						</div>
						<h4 class="page-title">@yield("title")</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-12">
					<div class="card-box">
						@if(session()->has('msg'))
							<div class="alert alert-success">
								{{ session()->get('msg') }}
							</div>
						@endif
						<h4 class="header-title">Filter</h4>

						<form method="post" action="" target="_blank"  enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="print" value="1">
							<div class="row">

								<div class="col-md-2">
									<label for="filter_category">Category</label>
									<select class="form-control"  data-toggle="select2" id="filter_category" onchange="studentList()">
										<option value="">All</option>
										@foreach ($categories as $item)
											<option value="{{ $item->id }}">{{ $item->title}}</option>
										@endforeach
									</select>
								</div>

								<div class="col-md-2">
									<label for="filter_group">News Status</label>
									<select class="form-control"  data-toggle="select2" id="filter_status" onchange="studentList()">
										<option value="">All</option>
										<option value="2">Draft</option>
										<option value="1">Published</option>
									</select>
								</div>

								<div class="col-md-2">
									<label for="filter_type">Type</label>
									<select class="form-control"  data-toggle="select2" id="filter_type" onchange="studentList()">
										<option value="">All</option>
										<option value="1">News</option>
										<option value="2">Events</option>
									</select>
								</div>
							</div>
						</form>
					</div> <!-- end card-box -->
					<div class="card-box">
						<table id="studentList" class="table table-bordered dt-responsive nowrap">
							<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Category</th>
								<th>Date</th>
								<th>Status</th>
								<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div> <!-- end card-box -->
				</div> <!-- end col -->
			</div> <!-- end row -->


		</div> <!-- container-fluid -->

	</div> <!-- content -->


@endsection

