<?php

namespace App\Http\Controllers;

use App\Models\PenjualModel;
use Illuminate\Http\Request;

class PenjualProfileController extends Controller
{
    public function inputDataPenjual()
    {
        return view('penjual.input-data-penjual', [
            'title' => 'data-penjual'
        ]);
    }
    public function inputDataPenjualProccess(Request $request)
    {
        $request->validate([
            'nama_warung' => 'required|unique:penjual',
            'lokasi' => 'required|unique:penjual',
            'nomer_telepon' => 'required|unique:penjual',
        ]);

        try {
            PenjualModel::create([
                'id_penjual' => Auth()->user()->id,
                'nama_warung' => $request->nama_warung,
                'lokasi' => $request->lokasi,
                'nomer_telepon' => $request->nomer_telepon,
            ]);
            return redirect()->route('dashboard.view')->with('success', 'profile warung anda berhasil diisi');
        } catch (\Throwable $th) {
            return back()->with('error', 'terjadi kesalahan server 500');
        }
    }
}
