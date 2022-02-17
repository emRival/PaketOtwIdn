<div>
    <label>Jurusan</label>
    <div class="input-group input-group-outline mb-2">
        <select class="form-control" required wire:model="kelas" name="id_kelas">
            <option selected>-- Pilih Jurusan --</option>
            @foreach($kelass as $row)
            <option value="{{$row->id}}">{{$row->nama_kelas}}</option>

            @endforeach
        </select>
    </div>


    <label>Nama (Kelas)</label>
    <div class="input-group input-group-outline">
        <select class="form-control" required wire:model="siswa" name="id_siswa">
            <option selected>-- Nama (Kelas) --</option>
            @foreach($siswas as $siswa)
            <option value="{{$siswa->id}}">{{$siswa->nama_siswa}}</option>

            @endforeach
        </select>
    </div>

</div>