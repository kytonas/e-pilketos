<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_urut', 'nama_ketua', 'nama_wakil', 'kelas', 'visi', 'misi', 'jurusan', 'tahun_ajaran', 'foto', 'foto_wakil','suara'];
    public $timestamp = true;

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/kandidat/' . $this->foto))) {
            unlink(public_path('images/kandidat/' . $this->foto));
        }
        if ($this->foto_wakil && file_exists(public_path('images/kandidat/wakil/' . $this->foto_wakil))) {
            unlink(public_path('images/kandidat/wakil/' . $this->foto_wakil));
        }
    }
   

    public function suara()
    {
        return $this->hasOne(Suara::class, 'id_kandidat');
    }
}
