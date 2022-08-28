<?php

namespace App\Http\Controllers;

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
        return view('pages.admin.beritaacara.beritaacaranotakapal.keluhan.index');
    }

    public function index2()
    {
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('pages.user.form.notakapal.index',[
        ]);
    }

    public function create2()
    {
        //
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
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'lampiranpendukung' => 'required',
        ]);
        
        $data = $request->except('_token');
        NotaKapal::create($data);
        return redirect()->route('formnotakapal.index')->with('success','Data berhasil ditambahkan');
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
