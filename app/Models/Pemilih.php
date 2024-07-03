<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama', 'nis', 'kelas', 'jurusan', 'password', 'status'];
    public $timestamp = true;

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return[
            'password' => 'hashed',
        ]; 
    }

    public function pemilih()
    {
        return $this->hasOne(Suara::class);
    }
}
 