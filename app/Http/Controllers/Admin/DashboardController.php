<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Surat;
use App\Models\ArsipKaryawan;
use App\Models\Dokumentasi;
use App\Models\Karyawan;
use App\Models\PengirimSurat;
use App\Models\Kategori;
use App\Models\PenerimaSurat;
use App\Models\Departemen;

class DashboardController extends Controller
{
    public function index()
    {
        $masuk = Surat::where('tipe_surat', 'Surat Masuk')->get()->count();
        $keluar = Surat::where('tipe_surat', 'Surat Keluar')->get()->count();
        $arsip_karyawan = ArsipKaryawan::get()->count();
        $documentation = Dokumentasi::get()->count();
        $karyawan = Karyawan::get()->count();
        $receiver = PenerimaSurat::get()->count();
        $category = Kategori::get()->count();
        $pengirim = PengirimSurat::get()->count();
        $departemen = Departemen::get()->count();

        return view('pages.admin.dashboard', [
            'masuk' => $masuk,
            'keluar' => $keluar,
            'arsip_karyawan' => $arsip_karyawan,
            'documentation' => $documentation,
            'karyawan' => $karyawan,
            'receiver' => $receiver,
            'category' => $category,
            'departemen' => $departemen,
            'pengirim' => $pengirim
        ]);
    }
}
