<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $cari;
    public $products = [];

    public function beli($id)
    {
        if(!Auth::user()){
           return redirect()->route('login');
        }
        $produk = Produk::find($id);
        Belanja::create(
            [
                'user_id' => Auth::user()->id,
                'produk_id'=> $id,
                'total_harga' => $produk->harga_produk,
                'status' => 0
            ]
        );
        return redirect('belanjauser');
    }

    public function render()
    {
        $this->products = Produk::all();
        if($this->cari){
            $this->products = Produk::where('nama_produk','LIKE', '%'. $this->cari. '%')->get();
        }
        return view('livewire.home')->extends('layouts.app')->section('content');
    }
}