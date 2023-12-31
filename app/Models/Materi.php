<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_matpel_id',
        'kelas_id',
        'judul',
        'subjudul',
        'deskripsi',
        'file_materi',
    ];

    public function gurumatpel()
    {
        return $this->belongsTo(GuruMatpel::class, 'guru_matpel_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
