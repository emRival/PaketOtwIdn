<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Auth;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $keyword = $request->cari;
         $user = User::find(auth()->user()->id);
        $kelas = Kelas::where('nama_kelas', 'like', "%" . $keyword . "%")->paginate(4);
        return view('kelas.index', compact('kelas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        Kelas::create($input);
        Alert::success('Success', "Data Jurusan {$request->nama_kelas} Berhasil Ditambahkan");

        return redirect('/jurusan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $input = $request->all();

        $kelas->update($input);
        Alert::info('Success', 'Data Jurusan Berhasil Di update');
        return redirect('/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        Alert::success('Success', "Data {$kelas->nama_kelas} berhasil di hapus");
        $kelas->delete();
        return back();
    }
}