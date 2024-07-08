<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Pemilih;
use App\Models\Suara;
use Illuminate\Http\Request;

class UservotingController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memastikan hanya pemilih yang bisa mengakses
        $this->middleware('pemilih');

    }

    public function index(Request $request)
    {
        $kandidat = Kandidat::all();
        // $pemilih = Pemilih::findOrFail($request->session()->get('pemilih_id'));
        $pemilih = $request->attributes->get('pemilih');

        // Mendapatkan data kandidat dengan jumlah suara
        // Mendapatkan data kandidat dengan hanya field yang diperlukan
        // Mendapatkan data kandidat dengan hanya field yang diperlukan
        $kandidatData = Kandidat::select('no_urut', 'suara')->get();

// Total suara
        $totalSuara = $kandidatData->sum('suara');

// Menyiapkan data untuk Chart.js
        $labels = $kandidatData->pluck('no_urut')->toArray();
        $data = $kandidatData->pluck('suara')->toArray();

        return view('uservoting.index', compact('kandidat', 'pemilih', 'labels', 'data'));

    }

    public function show($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return response()->json($kandidat);
    }

    public function success()
    {
        return view('uservoting.success');
    }

    public function store(Request $request)
    {
        $pemilih = Pemilih::findOrFail($request->id_pemilih);
        $pemilih->status = 1;
        $pemilih->save();

        $kandidat = Kandidat::findOrFail($request->id_kandidat);
        $kandidat->increment('suara');

        // Simpan suara
        Suara::create([
            'id_pemilih' => $request->id_pemilih,
            'id_kandidat' => $request->id_kandidat,
        ]);

        return redirect()->route('berhasil');
    }

}
