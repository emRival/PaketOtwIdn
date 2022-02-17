@extends('template')

@section('title')
Halaman Input Jurusan
@endsection

@section('head')
Data Jurusan
@endsection

@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">@yield('head')</h4>
                            <a href="#">
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#tambahkelas">
                                    <i class="fa fa-plus"></i> &nbsp;
                                    Jurusan
                                </button>
                            </a>
                            @include('kelas.modal.modal-index')
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <form class="form" method="get" action="#">
                                    <div class="row">
                                        <div class="col-md-6">


                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end">
                                            <input type="text" required name="cari" style="height: 30px !important;"
                                                class="form-control bg-light text-center" placeholder="cari"
                                                aria-controls="add-row">
                                            <button type="submit" class="btn btn-info text-center"
                                                style="height: 30px !important; width: 50px !important;"><i
                                                    class="material-icons text-center">search</i></button>
                                        </div>
                                    </div>
                                </form>


                                <div class="row">
                                    <div class="container">
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-sm-12">
                                        <table id="add-row" class=" table table-striped table-hover" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead>
                                                <tr style="text-align: center;" role="row">
                                                    <th class="sorting" style="width: 167.797px;">No</th>
                                                    <th class="sorting" style="width: 167.797px;">Jurusan</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($kelas as $row)
                                                <tr role="row" class="odd text-center">
                                                    <td>{{ $loop->iteration + $kelas->perpage() * ($kelas->currentPage() - 1) }}
                                                    </td>
                                                    <td>{{$row->nama_kelas}}</td>
                                                    <td>
                                                        <div class="form-button-action">

                                                            <a data-target="#editkelas{{$row->id}}" data-toggle="modal"
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            @include('kelas.modal.edit-kelas')
                                                            <form action="{{route('jurusan.destroy', $row->id)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" title="Delete"
                                                                    class="btn btn-link btn-danger"
                                                                    data-original-title="Remove"
                                                                    onclick="return confirm('Hapus Data  {{$row->nama_kelas}}?')">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Data Kosong</td>
                                                </tr>
                                                @endforelse
                                                <!--  -->
                                            </tbody>
                                        </table>
                                        <div class="justfy-content-start">
                                            <div class="dataTables_paginate paging_simple_numbers mt-2"
                                                id="add-row_paginate">
                                                {{ $kelas->links('pagination::bootstrap-4') }}
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