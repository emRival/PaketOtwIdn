<div class="modal fade" id="modal-edit-jenjang{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left\">
                        <h5 class="">Edit Data Jenjang</h5>
                        <p class="mb-0">Masukkan Data Jenjang Terbaru</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('jurusan.update', $row->id)}}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Jenjang</label>
                                <input type="text" class="form-control" name="nama_kelas" value="{{$row->nama_kelas}}"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>