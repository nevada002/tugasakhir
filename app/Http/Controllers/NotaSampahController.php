<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcaraNotaSampah;
use App\Models\NotaSampah;
use Illuminate\Http\Request;

class NotaSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaSampahs = NotaSampah::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacaranotasampah.keluhan.index', compact('notaSampahs'));
    }

    public function index2()
    {
        $notaSampahs = BeritaAcaraNotaSampah::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacaranotasampah.surat.index', compact('notaSampahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('pages.user.form.notasampah.index', []);
    }

    public function create2()
    {
        return view('pages.admin.beritaacara.beritaacaranotasampah.surat.create');
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
            'nomornota' => 'required',
            'deskripsi' => 'required',
            'lampiranpendukung' => 'required',
        ]);

        $data = $request->except('_token');
        NotaSampah::create($data);
        return redirect('formnotasampah')->with('success', 'Data berhasil ditambahkan');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'tanggalnotasampahkapal' => 'required',
            'dibuatoleh' => 'required',
            'lampiranpendukung' => 'required',
        ]);

        $data = $request->except('_token');
        BeritaAcaraNotaSampah::create($data);
        return redirect('/suratnotasampahkapal')->with('success', 'Data berhasil ditambahkan');
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
