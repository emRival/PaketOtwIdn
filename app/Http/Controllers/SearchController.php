<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class SearchController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function search(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $keyword = $request->cari;
        $barang = Barang::where('nama_penerima', 'like', "%" . $keyword . "%")->where('status', 'satpam')->paginate(5);
        

        return view('tracking.satpam', compact('barang','user'));
    }

    public function searchmusyrif(Request $request)
    {
       $user = User::find(auth()->user()->id);
        $keyword = $request->cari;
        $barang = Barang::where('nama_penerima', 'like', "%" . $keyword . "%")->where('status', 'musyrif')->paginate(5);
        

        return view('tracking.musyrif', compact('barang','user'));
    }

    public function searchdiambil(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $keyword = $request->cari;
        $barang = Barang::where('nama_penerima', 'like', "%" . $keyword . "%")->where('status', 'diambil')->paginate(5);
        

        return view('tracking.diambil', compact('barang','user'));
    }

    public function addbarang(Request $request){
    $input = $request->all();
    $input['tanggal_input'] = date('Y-m-d');
    Barang::create($input);
    $x=0;
    $file = $request->file('img');
    $file_name = time().''.$file->getClientOriginalName();
    $img = \Image::make($file);
    $img->save(Storage::path($file_name), $x);

        
        Alert::success('Success', "Data Barang Berhasil Diinput");
        return redirect('/satpam');
    }
}