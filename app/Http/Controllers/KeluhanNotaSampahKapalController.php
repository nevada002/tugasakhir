<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\NotaSampah;
use Illuminate\Http\Request;

class KeluhanNotaSampahKapalController extends Controller
{
    public function create()
    {
        return view('user.nota-sampah-kapal.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namakapal' => 'required',
            'tanggal' => ['required', 'date_format:Y-m-d'],
            'nomornota' => 'required',
            'deskripsi' => 'required',
            'lampiranpendukung' => 'required',
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        $data['lampiranpendukung'] = $fileName;
        $data['status'] = Status::PROCESS;
        $nota = NotaSampah::create($data);

        return redirect()->back()->with('success', 'Berhasil membuat keluhan. Nomor: ' . $nota->no_keluhan);
    }
}
