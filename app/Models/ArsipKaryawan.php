<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipKaryawan extends Model
{
    use HasFactory;
    protected $table = 'arsip_karyawan';
    protected $primaryKey = 'id_arsip_karyawan';
    protected $guarded = [];

    function employee()
    {
        return $this->belongsTo('App\Models\Karyawan', 'id_karyawan', 'id_karyawan');
    }

    function departemen()
    {
        return $this->belongsTo('App\Models\Departemen', 'id_departemen', 'id_departemen');
    }

    function category()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori_arsip', 'id_kategori_arsip');
    }
}
