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
        $masuk = Surat::where('tipe_surat', 'Surat Masuk')->count();
        $keluar = Surat::where('tipe_surat', 'Surat Keluar')->count();
        $arsip_karyawan = ArsipKaryawan::count();
        $documentation = Dokumentasi::count();
        $karyawan = Karyawan::count();
        $receiver = PenerimaSurat::count();
        $category = Kategori::count();
        $pengirim = PengirimSurat::count();
        $departemen = Departemen::count();

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
