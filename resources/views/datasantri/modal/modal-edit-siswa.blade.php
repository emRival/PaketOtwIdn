<div class="modal fade" id="modal-edit-siswa{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left\">
                        <h5 class="">Add Data Siswa</h5>
                        <p class="mb-0">Masukkan Data Siswa</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('datasantri.update', $row->id)}}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label class="form-label">Pilih Jenjang</label>
                            <div class="input-group input-group-outline">
                                <select name="id_kelas" required class="form-control">
                                    <option value="{{ $row->id_kelas }}">{{ $row->kelas->nama_kelas }}</option>
                                    @foreach($kelas as $row)
                                    <option value="{{$row->id}}">{{$row->nama_kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nama (Kelas)</label>
                                <input type="text" class="form-control" name="nama_siswa" value="{{$row->nama_siswa}}">
                            </div>
                            <label style="color: red !important;">Format = <span style="color: green !important;">
                                    NAMA (Kelas)
                                </span> </label>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>