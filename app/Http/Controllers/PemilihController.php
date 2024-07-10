<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemilih = Pemilih::all();
        return view('pemilih.index', compact('pemilih'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemilih.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => ['required', 'string', 'max:255'],
        //     'nis' => ['required', 'integer', 'max:255'],
        //     'kelas' => ['required', 'string', 'max:255'],
        //     'jurusan' => ['required', 'string', 'max:255'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'status' => ['required', 'string', 'max:255'],

        // ]);
        $pemilih = new Pemilih();
        $pemilih->nama = $request->nama;
        $pemilih->nis = $request->nis;
        $pemilih->kelas = $request->kelas;
        $pemilih->jurusan = $request->jurusan;
        $pemilih->password = Hash::make($request->password);
        $pemilih->save();

        return redirect()->route('pemilih.index')->with('success', 'Data Berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemilih = Pemilih::findOrFail($id);
        return view('pemilih.show', compact('pemilih'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemilih = Pemilih::findOrFail($id);
        return view('pemilih.edit', compact('pemilih'));
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
        $pemilih = Pemilih::findOrFail($id);
        $pemilih->nama = $request->nama;
        $pemilih->nis = $request->nis;
        $pemilih->kelas = $request->kelas;
        $pemilih->jurusan = $request->jurusan;
        if ($request->password) {
            $pemilih->password = Hash::make($request->password);
        }

        $pemilih->save();

        return redirect()->route('pemilih.index')->with('success', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemilih = Pemilih::findOrFail($id);
        $pemilih -> delete();
        return redirect()->route('pemilih.index');
    }
}
