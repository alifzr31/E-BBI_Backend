<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_matpel_id',
        'kelas_id',
        'judul',
        'subjudul',
        'deskripsi',
        'start_date',
        'end_date',
        'file_tugas',
    ];

    public function gurumatpel()
    {
        return $this->belongsTo(GuruMatpel::class, 'guru_matpel_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'tugas_siswas', 'tugas_id', 'siswa_id');
    }

    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }

    public function tugassiswasatuan()
    {
        $user = Auth::user();
        return $this->hasOne(TugasSiswa::class)->where('siswa_id', $user->siswa_id);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
