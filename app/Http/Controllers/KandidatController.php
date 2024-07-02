<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('kandidat.index', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kandidat.create');
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
            'no_urut' => ['required', 'integer', 'max:255'],
            'nama_ketua' => ['required', 'string', 'max:255'],
            'nama_wakil' => ['required', 'string', 'max:255'],
            'visi' => ['required', 'string'],
            'misi' => ['required', 'string'],
            'jurusan' => ['required', 'string', 'max:255'],
            'tahun_ajaran' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'string'],
        ]);

        $kandidat = new Kandidat;
        $kandidat->no_urut = $request->no_urut;
        $kandidat->nama_ketua = $request->nama_ketua;
        $kandidat->nama_wakil = $request->nama_wakil;
        $kandidat->kelas = $request->kelas;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->jurusan = $request->jurusan;
        $kandidat->tahun_ajaran = $request->tahun_ajaran;
        $kandidat->foto = $request->foto;

        //upload image
        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/kandidat', $name);
            $kandidat->foto = $name;

        }
        $kandidat->save();
        return redirect()->route('kandidat.index')->with('success', 'Data Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show(Kandidat $kandidat)
    {
        return view('kandidat.show', compact('kandidat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Kandidat $kandidat)
    {
        return view('kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_urut' => ['required', 'integer', 'max:255'],
            'nama_ketua' => ['required', 'string', 'max:255'],
            'nama_wakil' => ['required', 'string', 'max:255'],
            'visi' => ['required', 'string'],
            'misi' => ['required', 'string'],
            'jurusan' => ['required', 'string', 'max:255'],
            'tahun_ajaran' => ['required', 'string', 'max:255'],
            // 'foto' => ['required', 'string']
        ]);

        $kandidat = Kandidat::findOrFail($id);
        $kandidat->no_urut = $request->no_urut;
        $kandidat->nama_ketua = $request->nama_ketua;
        $kandidat->nama_wakil = $request->nama_wakil;
        $kandidat->kelas = $request->kelas;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->jurusan = $request->jurusan;
        $kandidat->tahun_ajaran = $request->tahun_ajaran;

        //upload image
        if ($request->hasFile('foto')) {
            $kandidat -> deleteImage();
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/kandidat', $name);
            $kandidat->foto = $name;

        }
        $kandidat->save();
        return redirect()->route('kandidat.index')->with('success', 'Data Berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat -> delete();
        return redirect()->route('kandidat.index');
    }
}
