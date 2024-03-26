<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarSurat extends Model
{
    use HasFactory;

    protected $table = 'komentar_surat';
    protected $primaryKey = 'id_komentar';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
