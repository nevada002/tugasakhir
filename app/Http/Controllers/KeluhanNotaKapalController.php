<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\NotaKapal;
use Illuminate\Http\Request;

class KeluhanNotaKapalController extends Controller
{
    public function create()
    {
        return view('user.nota-kapal.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namakapal' => 'required',
            'tanggal' => ['required', 'date_format:Y-m-d'],
            'deskripsi' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        $data['lampiranpendukung'] = $fileName;
        $data['status'] = Status::PROCESS;
        $notaKapal = NotaKapal::create($data);

        return redirect()->back()->with('success', 'Berhasil membuat keluhan. Nomor: ' . $notaKapal->no_keluhan);
    }
}
