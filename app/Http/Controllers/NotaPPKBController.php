<?php

namespace App\Http\Controllers;

use App\Models\NotaPPKB;
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
        return view('pages.admin.beritaacara.beritaacarappkb.keluhan.index');
    }

    public function index2()
    {
        return view('pages.admin.beritaacara.beritaacarappkb.surat.index');
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
        return redirect()->route('formppkb.index')->with('success','Data berhasil ditambahkan');
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
