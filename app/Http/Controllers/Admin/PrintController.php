<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArsipKaryawan;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

use App\Models\Surat;

class PrintController extends Controller
{
    public function index(Request $request)
    {
        if ($request->method() == 'POST') {
            // Mengambil nilai dari request
            $dariTanggal = $request->input('dari');
            $sampaiTanggal = $request->input('sampai');

            // Menambahkan filter berdasarkan tanggal dari dan sampai
            $query = Surat::with(['departemen', 'penerima_surat'])
                ->where('tipe_surat', 'Surat Masuk');

            if ($dariTanggal && $sampaiTanggal) {
                $query = $query->whereDate('tanggal_surat', '>=', $dariTanggal)
                    ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                    ->get();
            } else {
                // Jika input dari dan sampai tidak ada, tampilkan semua data
                $query = $query->get();
            }

            return view('pages.admin.letter.print-incoming', [
                'item' => $query
            ]);
        }

        return view('pages.admin.letter.print-incoming-index');
    }

    public function outgoing(Request $request)
    {
        if ($request->method() == 'POST') {
            // Mengambil nilai dari request
            $dariTanggal = $request->input('dari');
            $sampaiTanggal = $request->input('sampai');

            // Menambahkan filter berdasarkan tanggal dari dan sampai
            $query = Surat::with(['departemen', 'pengirim_surat'])
                ->where('tipe_surat', 'Surat Keluar');

            if ($dariTanggal && $sampaiTanggal) {
                $query = $query->whereDate('tanggal_surat', '>=', $dariTanggal)
                    ->whereDate('tanggal_surat', '<=', $sampaiTanggal)
                    ->get();
            } else {
                // Jika input dari dan sampai tidak ada, tampilkan semua data
                $query = $query->get();
            }

            return view('pages.admin.letter.print-outgoing', [
                'item' => $query
            ]);
        }

        return view('pages.admin.letter.print-outgoing-index');
    }



    public function employeeArchive(Request $request)
    {
        if ($request->method() == 'POST') {
            // Mengambil nilai dari request
            $dariTanggal = $request->input('dari');
            $sampaiTanggal = $request->input('sampai');

            // Menambahkan filter berdasarkan tanggal dari dan sampai
            $query = ArsipKaryawan::with('employee', 'departemen', 'category');

            if ($dariTanggal && $sampaiTanggal) {
                $items = $query->whereDate('created_at', '>=', $dariTanggal)
                    ->whereDate('created_at', '<=', $sampaiTanggal)
                    ->get();
            } else {
                // Jika input dari dan sampai tidak ada, tampilkan semua data
                $items = $query->get();
            }

            return view('pages.admin.arsip-karyawan.print-employee-archive', [
                'item' => $items
            ]);
        }

        return view('pages.admin.arsip-karyawan.print-index');
    }


    public function dokumentasi(Request $request)
    {
        if ($request->method() == 'POST') {
            // Mengambil nilai dari request
            $dariTanggal = $request->input('dari');
            $sampaiTanggal = $request->input('sampai');

            // Menambahkan filter berdasarkan tanggal dari dan sampai
            $query = Dokumentasi::with('employee', 'departemen');

            if ($dariTanggal && $sampaiTanggal) {
                $items = $query->whereDate('tanggal_dokumentasi', '>=', $dariTanggal)
                    ->whereDate('tanggal_dokumentasi', '<=', $sampaiTanggal)
                    ->get();
            } else {
                // Jika input dari dan sampai tidak ada, tampilkan semua data
                $items = $query->get();
            }

            return view('pages.admin.documentation.print-dokumentasi', [
                'item' => $items
            ]);
        }

        return view('pages.admin.documentation.print-index');
    }
}
