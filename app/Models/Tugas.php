<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_matpel_id',
        'judul',
        'subjudul',
        'deskripsi',
        'start_date',
        'end_date',
        'file_tugas',
    ];

    public function gurumatpel()
    {
        return $this->belongsTo(GuruMatpel::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'tugas_siswas', 'tugas_id', 'siswa_id');
    }

    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
}
