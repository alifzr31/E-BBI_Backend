<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruMatpel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'guru_id',
        'matpel_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class)->latest();
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class)->latest();
    }

    public function licon()
    {
        return $this->hasMany(Licon::class)->latest();
    }
}
