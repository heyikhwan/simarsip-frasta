<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArsip extends Model
{
    use HasFactory;

    protected $table = 'kategori_arsip';
    protected $primaryKey = 'id_kategori_arsip';
    protected $guarded = [];
}
