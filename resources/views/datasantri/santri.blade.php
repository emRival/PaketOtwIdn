@extends('template')
@section('title')
Halaman Input Siswa
@endsection

@section('side-bar')
Data Siswa
@endsection

@section('role')
{{$user->role}}
@endsection

@section('mini-icon-nav')
<i class="fas fa-user"></i>
@endsection

@section('head')
Data Siswa
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4  row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">Data Siswa</h6>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end mb-2">
                        <form method="get" action="{{route('search.siswa')}}">
                            <div class="d-flex justify-content-end me-2">
                                <input type="text" name="search" class="form-control w-50 h-75 d-inline bg-white"
                                    style="border: 1px solid; padding-left:8px;" id="cari" placeholder=" Search">
                            </div>
                        </form>
                        <button type="button" class="btn btn-block btn-light btn-round btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-form">
                            <i class="fa fa-plus"></i> &nbsp;
                            siswa
                        </button>
                    </div>

                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Jurusan</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama (Kelas)</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswa as $row)
                            <tr>
                                <td>
                                    <div class="d-flex px-3">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$row->kelas->nama_kelas}}</p>
                                </td>
                                <td>{{$row->nama_siswa}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-siswa{{$row->id}}"><i
                                            class="fa fa-edit"></i></button>
                                    @include('datasantri.modal.modal-edit-siswa')
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-del-siswa{{$row->id}}"><i
                                            class="fa fa-trash"></i></button>
                                    @include('datasantri.modal.modal-del-siswa')
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('datasantri.modal.modal-add-siswa')




@endsection