<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AhliWarisController extends Controller
{
    public function index()
    {
        $ahliWaris = DB::table('ahli_waris')->orderBy('created_at', 'desc')->get();
        return view('ahli_waris.index', compact('ahliWaris'));
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
