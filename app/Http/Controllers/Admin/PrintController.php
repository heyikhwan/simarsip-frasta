<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArsipKaryawan;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;

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

            return Pdf::loadView('pages.admin.letter.print-incoming', [
                'item' => $query
            ])
                ->setPaper('A4', 'portrait')
                ->stream();
        }

        $data = Surat::with(['departemen', 'penerima_surat'])
            ->where('tipe_surat', 'Surat Masuk')
            ->paginate(20);

        return view('pages.admin.letter.print-incoming-index', [
            'data' => $data
        ]);
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

            return Pdf::loadView('pages.admin.letter.print-outgoing', [
                'item' => $query
            ])
                ->setPaper('A4', 'portrait')
                ->stream();
        }

        $data = Surat::with(['departemen', 'penerima_surat'])
            ->where('tipe_surat', 'Surat Keluar')
            ->paginate(20);

        return view('pages.admin.letter.print-outgoing-index', [
            'data' => $data
        ]);
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

            return Pdf::loadView('pages.admin.arsip-karyawan.print-employee-archive', [
                'item' => $items
            ])
                ->setPaper('A4', 'landscape')
                ->stream();
        }

        $data = ArsipKaryawan::with('employee', 'departemen', 'category')
            ->paginate(20);

        return view('pages.admin.arsip-karyawan.print-index', [
            'data' => $data
        ]);
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

            return Pdf::loadView('pages.admin.documentation.print-dokumentasi', [
                'item' => $items
            ])
                ->setPaper('A4', 'portrait')
                ->stream();
        }

        $data = Dokumentasi::with('employee', 'departemen')
            ->paginate(20);

        return view('pages.admin.documentation.print-index', [
            'data' => $data
        ]);
    }
}
