@extends('template')

@section('title')
Halaman Input Jenjang
@endsection

@section('side-bar')
Data Siswa
@endsection

@section('role')
{{$user->role}}
@endsection

@section('mini-icon-nav')
<i class="fas fa-project-diagram"></i>
@endsection

@section('head')
Data Jurusan
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4  row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">Data Jenjang</h6>
                    </div>

                    <div class="col-md-6 text-end mb-2"><button type="button"
                            class="btn btn-block btn-light btn-round btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-form">
                            <i class="fa fa-plus"></i> &nbsp;
                            Jenjang
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
                                <th></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelas as $row)
                            <tr>
                                <td>
                                    <div class="d-flex px-3">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$row->nama_kelas}}</p>
                                </td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-jenjang{{$row->id}}"><i
                                            class="fa fa-edit"></i></button>
                                    @include('kelas.modal.modal-edit-jenjang')
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-del-jenjang{{$row->id}}"><i
                                            class="fa fa-trash"></i></button>
                                    @include('kelas.modal.modal-del-jenjang')
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('kelas.modal.modal-add-jenjang')




@endsection