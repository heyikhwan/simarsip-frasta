<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimSurat extends Model
{
    use HasFactory;
    protected $table = 'pengirim_surat';
    protected $primaryKey = 'id_pengirim_surat';
    protected $guarded = [];
}
