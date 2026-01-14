<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{

    // Method untuk menampilkan form pengajuan
    public function index()
    {
        return view('pengajuan');  // Menampilkan view pengajuan.blade.php
    }
    
    public function cekStatus(Request $request)
    {
        $nik = $request->query('nik');
        if (!$nik) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'NIK tidak ada',
            ]);
        }
        $row = DB::table('ahli_waris')->where('nik', $nik)->select('status')->first();
        if (!$row) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'NIK tidak ada',
            ]);
        }
        $status = is_string($row->status) ? strtolower($row->status) : (string)$row->status;
        if ($status === '1' || $status === 'diterima') {
            return response()->json([
                'status' => 'diterima',
                'message' => 'Permohonan anda diterima!, silahkan datang ke Walikota untuk proses selanjutnya',
            ]);
        }
        if ($status === '2' || $status === 'ditolak') {
            return response()->json([
                'status' => 'ditolak',
                'message' => 'Permohonan anda ditolak',
            ]);
        }
        return response()->json([
            'status' => 'proses',
            'message' => 'Permohonan Anda sedang diproses',
        ]);
    }
    
   public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|digits:16',
            'nama_lengkap' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'surat_pengantar_rt_rw' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'surat_pernyataan_ahli_waris' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'foto_bukti_penandatanganan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'surat_keterangan_kematian' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'surat_buku_nikah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'ktp_kk_penerima_manfaat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'akta_kelahiran_ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'surat_nikah_ahli_waris' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'akta_perceraian' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'akta_kematian_ahli_waris' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'ktp_keluarga_ahli_waris' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'surat_pernyataan_keabsahan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'surat_kuasa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan dalam pengisian form');
        }

        try {
            $paths = [];
            foreach ([
                'surat_pengantar_rt_rw',
                'surat_pernyataan_ahli_waris',
                'foto_bukti_penandatanganan',
                'surat_keterangan_kematian',
                'surat_buku_nikah',
                'ktp_kk_penerima_manfaat',
                'akta_kelahiran_ijazah',
                'surat_nikah_ahli_waris',
                'akta_perceraian',
                'akta_kematian_ahli_waris',
                'ktp_keluarga_ahli_waris',
                'surat_pernyataan_keabsahan',
                'surat_kuasa',
            ] as $field) {
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $paths[$field] = $request->file($field)->store('dokumen/ahli-waris', 'public');
                } else {
                    $paths[$field] = null;
                }
            }

            // Simpan data ke database
            DB::table('ahli_waris')->insert([
                'nik' => $request->input('nik'),
                'nama_lengkap' => $request->input('nama_lengkap'),
                'nomor_telepon' => $request->input('nomor_telepon'),
                'alamat' => $request->input('alamat'),
                'surat_pengantar_rt_rw' => $paths['surat_pengantar_rt_rw'],
                'surat_pernyataan_ahli_waris' => $paths['surat_pernyataan_ahli_waris'],
                'foto_bukti_penandatanganan' => $paths['foto_bukti_penandatanganan'],
                'surat_keterangan_kematian' => $paths['surat_keterangan_kematian'],
                'surat_buku_nikah' => $paths['surat_buku_nikah'],
                'ktp_kk_penerima_manfaat' => $paths['ktp_kk_penerima_manfaat'],
                'akta_kelahiran_ijazah_ahli_waris' => $paths['akta_kelahiran_ijazah'],
                'surat_nikah_ahli_waris' => $paths['surat_nikah_ahli_waris'],
                'akta_perceraian' => $paths['akta_perceraian'],
                'akta_kematian_ahli_waris' => $paths['akta_kematian_ahli_waris'],
                'ktp_suami_istri_anak_ahli_waris' => $paths['ktp_keluarga_ahli_waris'],
                'surat_pernyataan_keabsahan_dokumen' => $paths['surat_pernyataan_keabsahan'],
                'surat_kuasa' => $paths['surat_kuasa'],
                'status' => '0',
                'created_at' => now(),
            ]);

            // Redirect ke halaman terima kasih
            return redirect()->route('terima-kasih');

        } catch (\Throwable $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Tampilkan halaman terima kasih
     */
   public function showTerimaKasih()
{
    return view('terima-kasih');
}

}
