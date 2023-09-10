<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kls_angka',
        'kls_huruf',
    ];

    public function matpel()
    {
        return $this->belongsToMany(Matpel::class, 'guru_matpels', 'kelas_id', 'matpel_id');
    }

    public function gurumatpel()
    {
        return $this->hasMany(GuruMatpel::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
