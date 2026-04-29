<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PermohonanController
{
    public function index(Request $request)
    {
        $query = DB::table('ahli_waris')->orderByDesc('created_at');

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($x) use ($q) {
                $x->where('nik', 'like', '%' . $q . '%')
                  ->orWhere('nomor_telepon', 'like', '%' . $q . '%');
            });
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->input('tanggal'));
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->input('bulan'));
        }

        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->input('tahun'));
        }

        $items = $query->paginate(10)->appends($request->query());

        $pendingCount = DB::table('ahli_waris')
            ->whereNotIn('status', ['diterima', 'ditolak'])
            ->count();

        return view('permohonan.permohonan', compact('items', 'pendingCount'));
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');

        if (!in_array($status, ['menunggu', 'proses', 'tindak_lanjut', 'diterima', 'ditolak'])) {
            return Redirect::back()->with('success', 'Status tidak valid');
        }

        $exists = DB::table('ahli_waris')->where('id', $id)->exists();
        if (!$exists) {
            return Redirect::back()->with('success', 'Data permohonan tidak ditemukan');
        }

        DB::table('ahli_waris')
            ->where('id', $id)
            ->update(['status' => $status]);

        return Redirect::back()->with('success', 'Status permohonan telah diperbarui');
    }

    public function destroy($id)
    {
        DB::table('ahli_waris')->where('id', $id)->delete();

        return Redirect::back()->with('success', 'Permohonan berhasil dihapus');
    }

    public function edit($id)
    {
        $item = DB::table('ahli_waris')->where('id', $id)->first();

        if (!$item) {
            return Redirect::route('permohonan.index')->with('success', 'Data permohonan tidak ditemukan');
        }

        return view('permohonan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = DB::table('ahli_waris')->where('id', $id)->first();

        if (!$item) {
            return Redirect::route('permohonan.index')->with('success', 'Data permohonan tidak ditemukan');
        }

        $validated = $request->validate([
            'nik' => ['required', 'digits:16'],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'status' => ['nullable', 'in:menunggu,proses,tindak_lanjut,diterima,ditolak'],
        ]);

        $updateData = [
            'nik' => $validated['nik'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'alamat' => $validated['alamat'],
        ];

        if (!empty($validated['status'])) {
            $updateData['status'] = $validated['status'];
        }

        DB::table('ahli_waris')->where('id', $id)->update($updateData);

        return Redirect::route('permohonan.index')->with('success', 'Data permohonan berhasil diperbarui');
    }

    public function create()
    {
        return Redirect::back()->with('success', 'Fitur tambah belum tersedia');
    }
}
