<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_matpel',
        'semester',
    ];

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_matpels', 'matpel_id', 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'guru_matpels', 'matpel_id', 'kelas_id');
    }

    public function gurumatpel()
    {
        return $this->hasMany(GuruMatpel::class);
    }
}
