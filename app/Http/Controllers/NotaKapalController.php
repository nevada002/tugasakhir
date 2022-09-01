<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcaraNotaKapal;
use App\Models\NotaKapal;
use Illuminate\Http\Request;

class NotaKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // orderBy('id', 'asc')
        $notaKapals = NotaKapal::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacaranotakapal.keluhan.index', compact('notaKapals'));
    }

    public function index2()
    {
        $notaKapals = BeritaAcaraNotaKapal::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.index', compact('notaKapals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('pages.user.form.notakapal.index', []);
    }

    public function create2()
    {
        //
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namakapal' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);
        $filePath = 'filelampiranpendukung/' . $fileName;

        $notaKapal = new NotaKapal();
        $notaKapal->namakapal = $request->namakapal;
        $notaKapal->tanggal = $request->tanggal;
        $notaKapal->deskripsi = $request->deskripsi;
        $notaKapal->lampiranpendukung = $filePath;
        $notaKapal->save();
        return redirect('/formnotakapal')->with('success', 'Data berhasil ditambahkan');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'nama_perusahaan' => 'required',
            'no_surat_perusahaan' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
            'nomor_nota_kapal' => 'required',
            'dibuatoleh' => 'required',
            'keterangan' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);
        $filePath = 'filelampiranpendukung/' . $fileName;

        $notaKapal = new BeritaAcaraNotaKapal();
        $notaKapal->nomor_surat = $request->nomor_surat;
        $notaKapal->tanggal = $request->tanggal;
        $notaKapal->nama_perusahaan = $request->nama_perusahaan;
        $notaKapal->no_surat_perusahaan = $request->no_surat_perusahaan;
        $notaKapal->tanggal_surat = $request->tanggal_surat;
        $notaKapal->perihal = $request->perihal;
        $notaKapal->nomor_nota_kapal = $request->nomor_nota_kapal;
        $notaKapal->dibuatoleh = $request->dibuatoleh;
        $notaKapal->keterangan = $request->keterangan;
        $notaKapal->lampiranpendukung = $filePath;
        $notaKapal->save();
        return redirect('/suratnotakapal')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NotaKapal::find($id)->delete();
        return redirect('/suratnotakapal')->with('success', 'Data berhasil dihapus');
    }
}
