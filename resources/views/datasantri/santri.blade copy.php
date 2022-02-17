@extends('template')
@section('title')
Halaman Input Santri
@endsection

@section('head')
Data Santri
@endsection

@section('content')

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">@yield('title')</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{route('dashboard')}}">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">@yield('title')</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center justify-content-between">
							<h4 class="card-title">@yield('head')</h4>
							<a href="#">
								<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahsantri">
									<i class="fa fa-plus"></i> &nbsp;
									Santri
								</button>
							</a>
							@include('datasantri.modal.modal-santri')
						</div>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
								<div class="row">
									<div class="col-sm-12 col-md-6">

									</div>
									<div class="col-sm-12 col-md-6">
										<form class="form" method="get" action="#">
											<div id="add-row_filter" class="dataTables_filter">
												<label>Search:</label>
												<input type="text" name="cari" required class="form-control form-control-sm" placeholder="" aria-controls="add-row">
												<button type="submit" class="btn btn-info btn-sm">Cari</button>
											</div>
										</form>
									</div>

								</div>

								<div class="row">

									<div class="col-sm-12">
										<table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
											<thead>
												<tr style="text-align: center;" role="row">
													<th class="sorting" style="width: 167.797px;">No</th>
													<th class="sorting" style="width: 167.797px;">Jurusan</th>
													<th class="sorting" style="width: 167.797px;">Nama (Kelas)</th>
													<th style="width: 122.344px;" class="sorting">Action</th>
												</tr>
											</thead>
											<tbody>
												@forelse($siswa as $row)
												<tr role="row" class="odd text-center">
													<td>{{ $loop->iteration + $siswa->perpage() * ($siswa->currentPage() - 1) }}</td>
													<td class="">{{$row->kelas->nama_kelas}}</td>
													<td class="">{{$row->nama_siswa}}</td>

													<td>
														<div class="form-button-action">

															<a data-target="#editsantri{{$row->id}}" data-toggle="modal" data-id="row->id" data-nama_kategori="row->nama_kategori" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</a>
															@include('datasantri.modal.edit-santri')
															<form action="{{route('datasantri.destroy', $row->id)}}" method="post">
																@csrf
																@method('DELETE')
																<button type="submit" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Hapus Data {{$row->nama_siswa}}  ?')">
																	<i class="fa fa-times"></i>
																</button>
															</form>
														</div>
													</td>
												</tr>
												@empty
												<tr>
													<td colspan="4" class="text-center">Data Kosong</td>
												</tr>
												@endforelse
											</tbody>
										</table>
										<div class="justfy-content-start">
											<div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
												{{ $siswa->links('pagination::bootstrap-4') }}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




		@endsection