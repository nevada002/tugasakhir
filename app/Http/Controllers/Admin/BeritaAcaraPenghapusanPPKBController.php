<?php

namespace App\Http\Controllers\Admin;

use App\Models\BeritaAcaraNotaPPKB;
use App\Models\NotaPPKB;
use App\Models\StatusBeritaAcara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaAcaraPenghapusanPPKBController extends Controller
{
    public function index()
    {
        $notaPPKBs = BeritaAcaraNotaPPKB::orderBy('id', 'asc')->get();
        return view('admin.penghapusan-ppkb.berita-acara.index', compact('notaPPKBs'));
    }

    public function create()
    {
        return view('admin.penghapusan-ppkb.berita-acara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'nama_perusahaan' => 'required',
            'nama_kapal' => 'required',
            'noppkb' => 'required',
            'service_code' => 'required',
            'noukk' => 'required',
            'agen' => 'required',
            'lokasi' => 'required',
            'tujuan' => 'required',
            'dibuatoleh' => 'required',
            'alasan' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        BeritaAcaraNotaPPKB::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_kapal' => $request->nama_kapal,
            'noppkb' => $request->noppkb,
            'service_code' => $request->service_code,
            'noukk' => $request->noukk,
            'agen' => $request->agen,
            'lokasi' => $request->lokasi,
            'tujuan' => $request->tujuan,
            'dibuatoleh' => $request->dibuatoleh,
            'alasan' => $request->alasan,
            'lampiranpendukung' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
