<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_pemilih', 'id_kandidat'];
    public $timestamp = true;

    public function pemilih()
    {
        return $this->belongsTo(Pemilih::class, 'id_pemilih'); 
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'id_kandidat'); 
    }
}
