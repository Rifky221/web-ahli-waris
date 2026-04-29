<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AhliWarisController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('ahli_waris')->orderByDesc('created_at');

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($x) use ($q) {
                $x->where('nik', 'like', '%' . $q . '%')
                  ->orWhere('nama_lengkap', 'like', '%' . $q . '%')
                  ->orWhere('nomor_telepon', 'like', '%' . $q . '%')
                  ->orWhere('alamat', 'like', '%' . $q . '%');
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'pending') {
                $query->whereNotIn('status', ['diterima', 'ditolak']);
            } elseif (in_array($status, ['diterima', 'ditolak'], true)) {
                $query->where('status', $status)->orWhere(function($q) use ($status) {
                    // cover numeric legacy statuses
                    if ($status === 'diterima') $q->where('status', '1');
                    if ($status === 'ditolak') $q->where('status', '2');
                });
            }
        }
        
        if ($request->filled('focus_id')) {
            $query->where('id', $request->input('focus_id'));
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->input('bulan'));
        }
        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->input('tahun'));
        }

        $ahliWaris = $query->get();

        $pendingCount  = DB::table('ahli_waris')->whereNotIn('status', ['diterima', 'ditolak'])->count();
        $diterimaCount = DB::table('ahli_waris')->whereIn('status', ['diterima', '1'])->count();
        $ditolakCount  = DB::table('ahli_waris')->whereIn('status', ['ditolak', '2'])->count();
        $totalCount    = DB::table('ahli_waris')->count();

        return view('ahli_waris.index', compact('ahliWaris', 'pendingCount', 'diterimaCount', 'ditolakCount', 'totalCount'));
    }

    public function export()
    {
        $fileName = 'data-ahli-waris-' . date('Y-m-d_H-i-s') . '.csv';
        $data = DB::table('ahli_waris')->orderByDesc('created_at')->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No', 'NIK', 'Nama Lengkap', 'Nomor Telepon', 'Alamat', 'Status', 'Tanggal Dibuat'];

        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $index => $row) {
                $statusLabel = 'Belum Diproses';
                if ($row->status == '1' || $row->status == 'diterima') {
                    $statusLabel = 'Diterima';
                } elseif ($row->status == '2' || $row->status == 'ditolak') {
                    $statusLabel = 'Ditolak';
                }

                fputcsv($file, [
                    $index + 1,
                    "'".$row->nik, // Prevent Excel from converting to scientific notation
                    $row->nama_lengkap,
                    $row->nomor_telepon,
                    $row->alamat,
                    $statusLabel,
                    $row->created_at
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function showDokumen($id, $field)
    {
        $allowedFields = [
            'surat_pengantar_rt_rw',
            'surat_pernyataan_ahli_waris',
            'foto_bukti_penandatanganan',
            'surat_keterangan_kematian',
            'surat_buku_nikah',
            'ktp_kk_penerima_manfaat',
            'akta_kelahiran_ijazah_ahli_waris',
            'surat_nikah_ahli_waris',
            'akta_perceraian',
            'akta_kematian_ahli_waris',
            'ktp_suami_istri_anak_ahli_waris',
            'surat_pernyataan_keabsahan_dokumen',
            'surat_kuasa',
        ];

        if (!in_array($field, $allowedFields, true)) {
            abort(404);
        }

        $item = DB::table('ahli_waris')->where('id', $id)->first();

        if (!$item || !isset($item->$field) || !$item->$field) {
            abort(404);
        }

        $val = $item->$field;

        if (str_starts_with($val, 'http://') || str_starts_with($val, 'https://')) {
            return redirect()->away($val);
        }

        $relativePath = $val;

        $baseStoragePath = base_path('..' . DIRECTORY_SEPARATOR . 'SistemWarisUmum' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public');
        $candidatePath = $baseStoragePath . DIRECTORY_SEPARATOR . $relativePath;

        if (!file_exists($candidatePath)) {
            $publicStoragePath = base_path('..' . DIRECTORY_SEPARATOR . 'SistemWarisUmum' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'storage');
            $alternatePath = $publicStoragePath . DIRECTORY_SEPARATOR . $relativePath;
            if (file_exists($alternatePath)) {
                $candidatePath = $alternatePath;
            } else {
                abort(404);
            }
        }

        $mimeType = mime_content_type($candidatePath) ?: 'application/octet-stream';

        return Response::file($candidatePath, [
            'Content-Type' => $mimeType,
        ]);
    }
}
