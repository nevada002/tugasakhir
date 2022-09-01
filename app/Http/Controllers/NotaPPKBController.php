<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcaraNotaPPKB;
use App\Models\NotaPPKB;
use App\Models\StatusBeritaAcara;
use Illuminate\Http\Request;

class NotaPPKBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusBeritaAcara::all();
        $notaPPKBs = NotaPPKB::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacarappkb.keluhan.index', compact('notaPPKBs', 'status'));
    }

    public function index2()
    {
        $notaPPKBs = BeritaAcaraNotaPPKB::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacarappkb.surat.index', compact('notaPPKBs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.form.ppkb.index');
    }
    public function create2()
    {
        return view('pages.admin.beritaacara.beritaacarappkb.surat.create');
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
            'negara' => 'required',
            'noppkb' => 'required',
            'service' => 'required',
            'agen' => 'required',
            'alasan' => 'required',
        ]);

        $data = $request->except('_token');
        NotaPPKB::create($data);
        return redirect('formnotappkb')->with('success','Data berhasil ditambahkan');
    }

    public function store2(Request $request)
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
        return redirect('/suratpenghapusanppkb')->with('success', 'Data berhasil ditambahkan');
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
        //
    }
}
