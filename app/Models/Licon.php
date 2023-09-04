<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licon extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_matpel_id',
        'judul',
        'start_date',
        'end_date',
        'status',
    ];

    public function gurumatpel()
    {
        return $this->belongsTo(GuruMatpel::class);
    }
}
