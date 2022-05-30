<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;

class TambahProduk extends Component
{
    public $nama_produk, $harga_produk, $berat_produk, $gambar_produk;
    use WithFileUploads;
    public function mount()
    {
        if(Auth::user()){
            if(Auth::user()->level !== 1){
                return redirect()->to("");
            }
        }
    }

    public function store()
    {
        //validasi
        $this->validate(
            [
                'nama_produk' => 'required',
                'harga_produk' => 'required',
                'berat_produk' => 'required',
                'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|MAX:2048',
            ]
        );
        $nama_gambar = md5($this->gambar_produk . microtime()).'.'.$this->gambar_produk->extension();
        Storage::disk('public')->putfileAs('photos', $this->gambar_produk, $nama_gambar);
        // Storage::disk('public')->put('example.txt', 'Contents');
        
        Produk::create(
            [
                'nama_produk' => $this->nama_produk,
                'harga_produk' => $this->harga_produk,
                'berat_produk' => $this->berat_produk,
                'gambar_produk' => $nama_gambar
            ]
        );
        
        return redirect()->to('');
    }

    public function render()
    {
        return view('livewire.tambah-produk')->extends('layouts.app')->section('content');
    }
}