@extends('layouts.app')
@section('title','Tags')
@section("style")
	<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section("script")
	<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
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
				"aaSorting": [[1, 'asc']],
				"scrollX": true,
				"scrollCollapse": true,
				"columnDefs": [
					{
						"targets": [2,3,4],
						"orderable": false
					}, {
						"targets": [0,3,4 ],
						className: "text-center"
					}],
				"ajax": {
					url: "{{ route('tag_list') }}",
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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Tags</a></li>
								<li class="breadcrumb-item active">Tag List</li>
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

