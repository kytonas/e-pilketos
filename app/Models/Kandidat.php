<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_urut', 'nama_ketua', 'nama_wakil', 'kelas', 'visi', 'misi', 'jurusan', 'tahun_ajaran', 'foto'];
    public $timestamp = true;

    public function deleteImage(){
        if($this->cover && file_exists(public_path('images/kandidat' . $this->foto))){
            return unlink(public_path('images/kandidat' . $this->foto));
        }
    }
}
