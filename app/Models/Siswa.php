<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'nis',
        'nama',
        'alamat',
        'no_telp',
        'jk',
        'kelas',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

    public function siswamatpel()
    {
        return $this->hasMany(SiswaMatpel::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tugas()
    {
        return $this->belongsToMany(Tugas::class, 'tugas_siswas', 'siswa_id', 'tugas_id');
    }

    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
}
