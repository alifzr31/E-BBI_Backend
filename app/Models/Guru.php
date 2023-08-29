<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'no_telp',
        'jk',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

    public function matpel()
    {
        return $this->belongsToMany(Matpel::class, 'guru_matpels', 'guru_id', 'matpel_id');
    }

    public function gurumatpel()
    {
        return $this->hasMany(GuruMatpel::class);
    }
}
