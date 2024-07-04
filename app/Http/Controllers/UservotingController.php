<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;

class UservotingController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('uservoting.index', compact('kandidat'));
    }

    public function show($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return response()->json($kandidat);
    }

}
