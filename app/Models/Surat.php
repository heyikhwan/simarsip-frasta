<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'arsip_surat';
    protected $primaryKey = 'id_arsip_surat';

    protected $fillable = [
        'kode_surat',
        'tanggal_surat',
        'tanggal_diterima',
        'perihal',
        'id_departemen',
        'id_pengirim_surat',
        'id_penerima_surat',
        'file_arsip_surat',
        'status_surat',
        'tipe_surat',
        'komentar',
        'user_id'
    ];

    protected $hidden = [];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id_departemen');
    }

    public function pengirim_surat()
    {
        return $this->belongsTo(PengirimSurat::class, 'id_pengirim_surat', 'id_pengirim_surat');
    }

    public function penerima_surat()
    {
        return $this->belongsTo(PenerimaSurat::class, 'id_penerima_surat', 'id_penerima_surat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarSurat::class, 'id_arsip_surat', 'id_arsip_surat');
    }
}
