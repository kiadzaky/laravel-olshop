<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BelanjaUser extends Component
{
    public $belanja = [];
    public function mount()
    {
        if (Auth::user()) {
            $this->belanja = DB::table('belanjas')
                            ->join('produks', 'belanjas.produk_id', '=', 'produks.produk_id')
                            ->select('belanja_id', 'user_id', 'belanjas.produk_id', 
                            'status', 'belanjas.created_at', 'nama_produk', 'gambar_produk', 'harga_produk')
                            ->get();
        }else{
            return redirect()->route('login');
        }
    }

    public function hapus_belanja($id)
    {
        $pesanan = Belanja::find($id);
        $pesanan->delete();
        return redirect('belanjauser');
    }

    public function render()
    {
        return view('livewire.belanja-user')->extends('layouts.app')->section('content');
    }
}