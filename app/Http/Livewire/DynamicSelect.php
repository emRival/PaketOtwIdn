<?php

namespace App\Http\Livewire;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class DynamicSelect extends Component
{
    public $kelas;
    public $siswas = [];
    public $siswa;

    public function render()
    {
        if (!empty($this->kelas)) {
            $this->siswas = Siswa::where('id_kelas', $this->kelas)->get();
        }

        $kelass = Kelas::orderBy('nama_kelas')->get();

        return view('livewire.dynamic-select')
            ->with([
                'kelass' => $kelass
            ]);
    }
}
