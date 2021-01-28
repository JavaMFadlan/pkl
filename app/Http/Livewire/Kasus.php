<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\provinsi;
use App\kota;
use App\kecamatan;
use App\kelurahan;
use App\rw;
use App\tracking;

class Kasus extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;

    public $idT;
    public $idRw;
    public $cek1 = NULL;

    public $pprovinsi = NULL;
    public $pkota = NULL;
    public $pkecamatan = NULL;
    public $pkelurahan = NULL;
    public $prw = NULL;

    public function mount($idt = NULL,$idrw = NULL, $cek = NULL)
    {
        $this->provinsi = provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();

        if(!is_null($idt)){
            $tracking = tracking::findorfail($idt);
            
        }
        if (!is_null($idrw)) {
            $rw = rw::with('kelurahan.kecamatan.kota.provinsi')->find($idrw);
        
            if($rw){
                $this->rw = rw::where('id_kel', $rw->id_kel)->get();
                $this->kelurahan = kelurahan::where('id_kec', $rw->kelurahan->id_kec)->get();
                $this->kecamatan = kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = kota::where('id_prov', $rw->kelurahan->kecamatan->kota->id_prov)->get();

                $this->pprovinsi = $rw->kelurahan->kecamatan->kota->id_prov;
                $this->pkota = $rw->kelurahan->kecamatan->id_kota;
                $this->pkecamatan = $rw->kelurahan->id_kec;
                $this->pkelurahan = $rw->id_kel;
                $this->prw = $rw->id;
                if ($cek == 1) {
                    $this->cek1 = $cek;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.kasus');

        
    }

    public function updatedpprovinsi($provinsi)
    {
        $this->kota = kota::where('id_prov', $provinsi)->get();
        $this->pkota = NULL;
        $this->pkecamatan = NULL;
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkota($kota)
    {
        $this->kecamatan = kecamatan::where('id_kota', $kota)->get();
        $this->pkecamatan = NULL;
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkecamatan($kecamatan)
    {
        $this->kelurahan = kelurahan::where('id_kec', $kecamatan)->get();
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkelurahan($kelurahan)
    {
        $this->rw = rw::where('id_kel', $kelurahan)->get();
        $this->prw = NULL;
    }


}
