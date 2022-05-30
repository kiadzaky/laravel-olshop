<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;

class TambahOngkir extends Component
{
    public $belanja = [];
    public $produk = [];
    public $asal_kota, $tujuan;
    public function mount($user_id)
    {
        if(Auth::user()){
            return redirect()->route('login');
        }
        $this->belanja = Belanja::where('user_id', $user_id);
    }
    public function render()
    {
        $ongkir = RajaOngkir::ongkosKirim([
            'origin'        => 155,     // ID kota/kabupaten asal
            'destination'   => 80,      // ID kota/kabupaten tujuan
            'weight'        => 1300,    // berat barang dalam gram
            'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ]);
        $daftarProvinsi = RajaOngkir::kota()->search('su')->get();
        dd($daftarProvinsi);
        return view('livewire.tambah-ongkir')->extends('layouts.app')->section('content');
    }
}