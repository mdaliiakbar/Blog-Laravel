@extends('layouts.app')
@section('title','Category')
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
			if(confirm("Are you sure to delete this?")){
				return true;
			} return false;
		}

		function studentList(){
			var filterData  = {
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
				"aaSorting": [[0, 'desc']],
				"scrollX": true,
				"scrollCollapse": true,
				"columnDefs": [
					{
						"targets": [2,3,4],
						"orderable": false
					}, {
						"targets": [0,2, 3,4],
						className: "text-center"
					}],
				"ajax": {
					url: "{{ route('category_list') }}",
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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
								<li class="breadcrumb-item active">Category List</li>
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
								<th>#</th>
								<th>Title</th>
								<th>Post</th>
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

