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
            'lampiranpendukung' => 'required',
        ]);

        $data = $request->except('_token');
        NotaKapal::create($data);
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
            'lampiranpendukung' => 'required',
        ]);

        $data = $request->except('_token');
        BeritaAcaraNotaKapal::create($data);
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
        // delete by id
        NotaKapal::find($id)->delete();
        return redirect('/suratnotakapal')->with('success', 'Data berhasil dihapus');
    }
}
