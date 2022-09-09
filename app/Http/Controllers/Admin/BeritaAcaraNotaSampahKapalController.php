<?php

namespace App\Http\Controllers\Admin;

use App\Models\BeritaAcaraNotaSampah;
use App\Models\NotaSampah;
use App\Models\StatusBeritaAcara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaAcaraNotaSampahKapalController extends Controller
{
    public function index()
    {
        $notaSampahs = BeritaAcaraNotaSampah::orderBy('id', 'asc')->get();
        return view('admin.nota-sampah-kapal.berita-acara.index', compact('notaSampahs'));
    }

    public function create()
    {
        return view('admin.nota-sampah-kapal.berita-acara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'tanggalnotasampahkapal' => 'required',
            'dibuatoleh' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        BeritaAcaraNotaSampah::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'tanggalnotasampahkapal' => $request->tanggalnotasampahkapal,
            'dibuatoleh' => $request->dibuatoleh,
            'lampiranpendukung' => $fileName,
        ]);
        
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
