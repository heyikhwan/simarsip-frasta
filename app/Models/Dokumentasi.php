<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'arsip_dokumentasi';
    protected $primaryKey = 'id_arsip_dokumentasi';
    protected $guarded = [];

    function departemen()
    {
        return $this->belongsTo('App\Models\Departemen', 'id_departemen', 'id_departemen');
    }
    function employee()
    {
        return $this->belongsTo('App\Models\Karyawan', 'id_karyawan', 'id_karyawan');
    }
}
