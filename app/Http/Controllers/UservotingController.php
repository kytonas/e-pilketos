<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Support\Facades\Session;



class UservotingController extends Controller
{
   public function __construct()
    {
        // Middleware untuk memastikan hanya pemilih yang bisa mengakses
        $this->middleware('pemilih');

    }

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

    public function success()
    {
        return view('uservoting.success');
    }
}
