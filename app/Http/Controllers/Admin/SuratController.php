<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Surat;
use App\Models\Departemen;
use App\Models\Notifikasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PenerimaSurat;
use App\Models\PengirimSurat;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $departments = Departemen::all();
        $senders = PengirimSurat::all();
        $receivers = PenerimaSurat::all();

        // Menghitung jumlah surat masuk dan surat keluar
        $countSM = Surat::where('tipe_surat', 'Surat Masuk')->count();
        $countSK = Surat::where('tipe_surat', 'Surat Keluar')->count();

        // Membuat kode surat unik
        $codeSM = $this->generateUniqueCode('SM', 0);
        $codeSK = $this->generateUniqueCode('SK', 0);

        return view('pages.admin.letter.create', [
            'departments' => $departments,
            'senders' => $senders,
            'receivers' => $receivers,
            'codeSM' => $codeSM,
            'codeSK' => $codeSK,
        ]);
    }

    private function generateUniqueCode($prefix, $count)
    {
        $code = $prefix . str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        // Memeriksa apakah kode sudah digunakan sebelumnya
        if (Surat::where('kode_surat', $code)->exists()) {
            // Jika sudah, ulangi proses untuk mendapatkan kode yang unik
            $count++;
            return $this->generateUniqueCode($prefix, $count);
        }

        return $code;
    }

    public function update_komentar(Request $request, $id_komentar)
    {
        $surat = Surat::where("id_arsip_surat", $id_komentar)->first();

        if ($request->btn_tipe == 'approve') {
            $this->approve_doc($request, $id_komentar);
        }

        if ($request->btn_tipe == 'revisi') {
            $surat->update([
                "status_surat" => "Request Update",
                "komentar" => $request->komentar
            ]);

            Notifikasi::create([
                'keterangan' => "Ada komentar untuk kode surat " . $surat->kode_surat,
                'url' => route('detail-surat', $surat->id_arsip_surat),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $surat->user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $redirect = "";
        if ($surat->tipe_surat == "Surat Masuk") {
            $redirect = "surat-masuk";
        } else if ($surat->tipe_surat == "Surat Keluar") {
            $redirect = "surat-keluar";
        }

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function update_dokumen(Request $request, $id_komentar)
    {
        $surat = Surat::where("id_arsip_surat", $id_komentar)->first();

        $request->validate([
            "dokumen" => "required|mimes:pdf|file"
        ]);

        Storage::delete($surat->file_arsip_surat);

        $new_file_surat = $request->file('dokumen')->store('assets/letter-file');

        $surat->update([
            "file_arsip_surat" => $new_file_surat,
            "status_surat" => "Revisi"
        ]);

        $penerima = User::where("level", "manajer")
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => "Upload Dokumen Arsip Surat Baru dari kode surat " . $surat->kode_surat,
                'url' => route('detail-surat', $surat->id_arsip_surat),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $redirect = "";
        if ($surat->tipe_surat == "Surat Masuk") {
            $redirect = "surat-masuk";
        } else if ($surat->tipe_surat == "Surat Keluar") {
            $redirect = "surat-keluar";
        }

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function approve_doc(Request $request, $id_komentar)
    {
        $surat = Surat::where("id_arsip_surat", $id_komentar)->first();

        $surat->update([
            "status_surat" => "Approve",
            "komentar" => ""
        ]);

        Notifikasi::create([
            'keterangan' => "Dokumen berhasil di approve",
            'user_id' => auth()->user()->id_user,
            'url' => route('detail-surat', $surat->id_arsip_surat),
            'penerima_id' => $surat->user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $redirect = "";
        if ($surat->tipe_surat == "Surat Masuk") {
            $redirect = "surat-masuk";
        } else if ($surat->tipe_surat == "Surat Keluar") {
            $redirect = "surat-keluar";
        }

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function goToNotification(Request $request, $id)
    {
        Notifikasi::where('id_notifikasi', $id)->update(['read_at' => date('Y-m-d H:i:s')]);
        if ($request->tipe_arsip == 'surat') {
            $letter = Surat::findOrFail($request->id_surat);
            if ($letter->status_surat == 'Approve') {
                return redirect('admin/letter/surat/' . $request->id_surat);
            }

            if ($letter->status_surat == 'Pending') {
                return redirect('admin/letter/surat/' . $request->id_surat);
            }

            if ($letter->status_surat == 'Not Approve') {
                return redirect('admin/letter/surat/' . $request->id_surat);
            }

            if ($letter->status_surat == 'Request Update') {
                return redirect('admin/letter/' . $request->id_surat . '/edit');
            }
        } else {
            return redirect('admin/arsip-karyawan/' . $request->id_surat . '/edit');
        }
    }

    public function store(Request $request)
    {
        if ($request->tipe_surat == 'Surat Masuk') {
            $validatedData = $request->validate([
                'kode_surat' => [
                    'required',
                    Rule::unique('arsip_surat')->where(function ($query) use ($request) {
                        return $query->where('tipe_surat', 'Surat Masuk');
                    }),
                ],
                'tanggal_surat' => 'required',
                'tanggal_diterima' => 'required',
                'perihal' => 'required',
                'id_departemen' => 'required',
                'id_penerima_surat' => 'required',
                'file_arsip_surat' => 'required|mimes:pdf|file',
                'tipe_surat' => 'required',
            ]);
        } else {
            $validatedData = $request->validate([
                'kode_surat' => [
                    'required',
                    Rule::unique('arsip_surat')->where(function ($query) use ($request) {
                        return $query->where('tipe_surat', 'Surat Keluar');
                    }),
                ],
                'tanggal_surat' => 'required',
                'tanggal_diterima' => 'required',
                'perihal' => 'required',
                'id_departemen' => 'required',
                'id_pengirim_surat' => 'required',
                'file_arsip_surat' => 'required|mimes:pdf|file',
                'tipe_surat' => 'required',
            ]);
        }

        if ($request->file('file_arsip_surat')) {
            $validatedData['file_arsip_surat'] = $request->file('file_arsip_surat')->store('assets/letter-file');
        }
        $type = 'Surat Masuk';
        if ($validatedData['tipe_surat'] == 'Surat Masuk') {
            $redirect = 'surat-masuk';
        } else {
            $type = 'Surat Keluar';
            $redirect = 'surat-keluar';
        }

        $validatedData["user_id"] = Auth::user()->id_user;

        $letter = Surat::create($validatedData);

        $penerima = User::where("level", "manajer")
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => 'Ada ' . $type . ' baru<br>Kode :' . $letter->kode_surat . '<br> Keterangan: Surat baru dibuat oleh ' . auth()->user()->nama_lengkap,
                'url' => route('detail-surat', $letter->id_arsip_surat),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $value->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function approval_letter($id)
    {

        $komentar = request('komentar');
        $status = request('status_surat');
        $letter = Surat::findOrFail($id);
        $type = 'Surat Masuk';
        if ($letter->tipe_surat == 'Surat Masuk') {
            $redirect = 'surat-masuk';
        } else {
            $redirect = 'surat-keluar';
            $type = 'Surat Keluar';
        }
        $letter->update(['status_surat' => $status]);

        if ($status == 'Approve') {
            Notifikasi::create([
                'keterangan' => $type . ' ' . $status . '<br>Kode :' . $letter->kode_surat,
                'url' => route('detail-surat', $letter->id_arsip_surat),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $letter->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        if ($status == 'Request Update') {
            $letter->update(['komentar_request' => $komentar]);
            Notifikasi::create([
                'keterangan' => $type . ' ' . $status . '<br>Kode :' . $letter->kode_surat . '<br> Keterangan: ' . $komentar,
                'url' => route('detail-surat', $letter->id_arsip_surat),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $letter->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        if ($status == 'Not Approve') {
            $letter->update(['komentar_not_approve' => $komentar]);
            Notifikasi::create([
                'keterangan' => $type . ' ' . $status . '<br>Kode :' . $letter->kode_surat . '<br> Keterangan: ' . $komentar,
                'url' => route('detail-surat', $letter->id_arsip_surat),
                'user_id' => auth()->user()->id_user,
                'penerima_id' => $letter->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil ' . $status);
    }

    public function incoming_mail()
    {
        if (request()->ajax()) {
            $query = Surat::with(['departemen', 'penerima_surat', 'user'])
                ->leftJoin('users', 'users.id_user', '=', 'arsip_surat.user_id')
                ->leftJoin('departemen', 'departemen.id_departemen', '=', 'users.id_departemen')
                ->where('tipe_surat', 'Surat Masuk')
                ->select(
                    'arsip_surat.*',
                    'users.nama_lengkap',
                    'departemen.nama_departemen',
                )
                ->latest()
                ->get();

            return Datatables::of($query)
                ->addColumn('checkbox', function ($item) {
                    return auth()->user()->level == 'manajer' ? '<div class="text-center"><input class="checkItem" type="checkbox" value="' . $item->id_arsip_surat . '"></div>' : '';
                })
                ->addColumn('action', function ($item) {
                    $buttons = '<a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id_arsip_surat) . '">
                <i class="fa fa-search-plus"></i> &nbsp; Detail
                </a>
                ';

                    if (auth()->user()->level == 'karyawan') {
                        if ($item->status_surat == 'Pending' || $item->status_surat == 'Request Update') {
                            if ($item->user_id == Auth::user()->id_user) {
                                $buttons .= '<a class="btn btn-primary btn-xs" href="' . route('letter.edit', $item->id_arsip_surat) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                            </a>
                            ';
                            }
                        }

                        if ($item->status_surat == 'Pending' || $item->status_surat == 'Request Update') {
                            if ($item->user_id == Auth::user()->id_user) {
                                $buttons .= '<form action="' . route('letter.destroy', $item->id_arsip_surat) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini?'" . ')">
                        ' . method_field('delete') . csrf_field() . '
                        <button class="btn btn-danger btn-xs">
                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                        </button>
                        </form>';
                            }
                        }
                    }

                    if (auth()->user()->level == 'manajer') {
                        $buttons .= '<form action="' . route('letter.destroy', $item->id_arsip_surat) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini?'" . ')">
                    ' . method_field('delete') . csrf_field() . '
                    <button class="btn btn-danger btn-xs">
                    <i class="far fa-trash-alt"></i> &nbsp; Hapus
                    </button>
                    </form>';
                        // if ($item->status_surat == "Revisi") {
                        //     $buttons .= '<form action="' . url('/admin/letter/surat-masuk/' . $item->id_arsip_surat . '/approve_doc') . '" method="POST" onsubmit="return confirm(' . "'Anda Ingin Approve Data Ini?'" . ')">
                        //         ' . method_field('PUT') . csrf_field() . '
                        //     <button class="btn btn-primary btn-xs">
                        //     <i class="far fa-thumbs-up"></i> &nbsp; Approve
                        //     </button>
                        //     </form>';
                        // }
                    }

                    return $buttons;
                })
                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Approve' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['checkbox', 'action', 'post_status'])
                ->make();
        }

        return view('pages.admin.letter.incoming');
    }

    public function outgoing_mail()
    {
        if (request()->ajax()) {
            $query = Surat::with(['departemen', 'pengirim_surat', 'user'])
                ->leftJoin('users', 'users.id_user', '=', 'arsip_surat.user_id')
                ->leftJoin('departemen', 'departemen.id_departemen', '=', 'users.id_departemen')
                ->where('tipe_surat', 'Surat Keluar')
                ->select(
                    'arsip_surat.*',
                    'users.nama_lengkap',
                    'departemen.nama_departemen',
                )
                ->latest()
                ->get();

            return Datatables::of($query)
                ->addColumn('checkbox', function ($item) {
                    return auth()->user()->level == 'manajer' ? '<div class="text-center"><input class="checkItem" type="checkbox" value="' . $item->id_arsip_surat . '"></div>' : '';
                })
                ->addColumn('action', function ($item) {
                    $buttons = '<a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id_arsip_surat) . '">
            <i class="fa fa-search-plus"></i> &nbsp; Detail
            </a>
            ';

                    if (auth()->user()->level == 'karyawan' && $item->user_id == auth()->user()->id_user) {
                        if ($item->status_surat == 'Pending' || $item->status_surat == 'Request Update') {
                            $buttons .= '<a class="btn btn-primary btn-xs" href="' . route('letter.edit', $item->id_arsip_surat) . '">
                    <i class="fas fa-edit"></i> &nbsp; Ubah
                    </a>
                    ';
                        }

                        if ($item->status_surat == 'Pending' || $item->status_surat == 'Request Update') {
                            $buttons .= '<form action="' . route('letter.destroy', $item->id_arsip_surat) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini?'" . ')">
                    ' . method_field('delete') . csrf_field() . '
                    <button class="btn btn-danger btn-xs">
                    <i class="far fa-trash-alt"></i> &nbsp; Hapus
                    </button>
                    </form>';
                        }
                    }

                    if (auth()->user()->level == 'manajer') {
                        $buttons .= '<form action="' . route('letter.destroy', $item->id_arsip_surat) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini?'" . ')">
                ' . method_field('delete') . csrf_field() . '
                <button class="btn btn-danger btn-xs">
                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                </button>
                </form>';
                        // if ($item->status_surat == "Revisi") {
                        //     $buttons .= '<form action="' . url('/admin/letter/surat-masuk/' . $item->id_arsip_surat . '/approve_doc') . '" method="POST" onsubmit="return confirm(' . "'Anda Ingin Approve Data Ini?'" . ')">
                        //     ' . method_field('PUT') . csrf_field() . '
                        // <button class="btn btn-primary btn-xs">
                        // <i class="far fa-thumbs-up"></i> &nbsp; Approve
                        // </button>
                        // </form>';
                        // }
                    }

                    return $buttons;
                })
                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['checkbox', 'action', 'post_status'])
                ->make();
        }

        return view('pages.admin.letter.outgoing');
    }

    public function show($id)
    {
        $item = Surat::with(['departemen', 'pengirim_surat', 'penerima_surat'])->findOrFail($id);
        return view('pages.admin.letter.show', [
            'item' => $item,
        ]);
    }

    public function edit($id)
    {
        $item = Surat::findOrFail($id);

        $departments = Departemen::all();
        $senders = PengirimSurat::all();
        $receivers = PenerimaSurat::all();
        // dd($item);

        $countSK = Surat::where('tipe_surat', 'Surat Keluar')->count();

        $codeSM = $item->kode_surat;
        $codeSK = 'SK' . str_pad($countSK + 1, 4, '0', STR_PAD_LEFT);

        if ($item->tipe_surat == 'Surat Keluar') {
            $countSM = Surat::where('tipe_surat', 'Surat Masuk')->count();

            $codeSM = 'SM' . str_pad($countSM + 1, 4, '0', STR_PAD_LEFT);
            $codeSK = $item->kode_surat;
        }

        return view('pages.admin.letter.edit', [
            'departments' => $departments,
            'senders' => $senders,
            'item' => $item,
            'receivers' => $receivers,
            'codeSM' => $codeSM,
            'codeSK' => $codeSK,
        ]);
    }

    public function download_letter($id)
    {
        $item = Surat::findOrFail($id);

        return Storage::download($item->file_arsip_surat);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_surat' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'perihal' => 'required',
            'id_departemen' => 'required',
            'file_arsip_surat' => 'mimes:pdf|file',
            'tipe_surat' => 'required',
        ]);

        $type = 'Surat Masuk';
        if ($validatedData['tipe_surat'] == 'Surat Masuk') {
            $validatedData['id_penerima_surat'] = $request->id_penerima_surat;
            $validatedData['id_pengirim_surat'] = null;
            $redirect = 'surat-masuk';
        } else {
            $validatedData['id_pengirim_surat'] = $request->id_pengirim_surat;
            $validatedData['id_penerima_surat'] = null;
            $redirect = 'surat-keluar';
            $type = 'Surat Keluar';
        }

        $item = Surat::findOrFail($id);

        if ($request->file('file_arsip_surat')) {
            $validatedData['file_arsip_surat'] = $request->file('file_arsip_surat')->store('assets/letter-file');
        }


        $validatedData['status_surat'] = 'Pending';
        $item->update($validatedData);

        $letter = Surat::findOrFail($id);

        $penerima = User::where(function ($query) {
                $query->where('level', 'karyawan')
                    ->orWhere('level', 'manajer');
            })
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => 'Update ' . $type . '<br>Kode :' . $letter->kode_surat . '<br> Keterangan: Surat telah di update oleh ' . auth()->user()->nama_lengkap,
                'url' => route('detail-surat', $letter->id_arsip_surat),
                'penerima_id' => $value->id_user,
                'user_id' => auth()->user()->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = Surat::findorFail($id);

        if ($item->tipe_surat == 'Surat Masuk') {
            $redirect = 'surat-masuk';
        } else {
            $redirect = 'surat-keluar';
        }

        Storage::delete($item->file_arsip_surat);

        $penerima = User::where(function ($query) {
                $query->where('level', 'karyawan')
                    ->orWhere('level', 'manajer');
            })
            ->where('id_user', '<>', auth()->user()->id_user)
            ->get();

        foreach ($penerima as $value) {
            Notifikasi::create([
                'keterangan' => auth()->user()->nama_lengkap . ' Menghapus ' . $item->tipe_surat . '<br>Kode :' . $item->kode_surat,
                'url' => route($item->kode_surat),
                'penerima_id' => $value->id_user,
                'user_id' => auth()->user()->id_user,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $item->delete();

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }

    public function bulk_delete(Request $request)
    {
        $ids = $request->ids;

        $surats = Surat::whereIn('id_arsip_surat', $ids)->get();

        foreach ($surats as $surat) {
            $penerima = User::where(function ($query) {
                    $query->where('level', 'karyawan')
                        ->orWhere('level', 'manajer');
                })
                ->where('id_user', '<>', auth()->user()->id_user)
                ->get();

            foreach ($penerima as $value) {
                Notifikasi::create([
                    'keterangan' => auth()->user()->nama_lengkap . ' Menghapus ' . $surat->tipe_surat . '<br>Kode :' . $surat->kode_surat,
                    'url' => route(Str::slug($surat->tipe_surat)),
                    'penerima_id' => $value->id_user,
                    'user_id' => auth()->user()->id_user,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        foreach ($surats as $surat) {
            Storage::delete($surat->file_arsip_surat);
        }

        Surat::whereIn('id_arsip_surat', $ids)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses! ' . count($ids) . ' Data Berhasil Dihapus',
        ]);
    }
}
