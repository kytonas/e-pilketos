<?php

namespace App\Http\Controllers;

use App\Models\Suara;
use App\Models\Pemilih;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suara = Suara::all();
        return view('suara.index', compact('suara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemilih = Pemilih::all();
        $kandidat = Kandidat::all();
        return view('suara.create', compact('pemilih', 'kandidat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemilih' => ['required', 'integer'],
            'id_kandidat' => ['required', 'integer'],
        ]);
        
        $suara = new Suara();
        $suara -> id_pemilih = $request-> id_pemilih;
        $suara -> id_kandidat = $request-> id_kandidat;
        $suara -> save();
        return redirect()->route('suara.index')->with('success', 'Data Berhasil ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suara = Suara::findOrFail($id);
        return view('suara.show', compact('suara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suara = Suara::findOrFail($id);
        $pemilih = Pemilih::all();
        $kandidat = Kandidat::all();
        return view('suara.edit', compact('suara', 'pemilih', 'kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pemilih' => ['required', 'integer'],
            'id_kandidat' => ['required', 'integer'],
        ]);

        $suara = Suara::findOrFail($id);
        $suara->id_pemilih = $request->id_pemilih;
        $suara->id_kandidat = $request->id_kandidat;
        $suara->save();
        return redirect()->route('suara.index')->with('success', 'Data Berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suara $id)
    {
        $suara = Suara::findOrFail($id);
        $suara->delete();
        return redirect()->route('suara.index');
    }
}
