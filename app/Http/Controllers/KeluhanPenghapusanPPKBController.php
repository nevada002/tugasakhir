<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\NotaPPKB;
use Illuminate\Http\Request;

class KeluhanPenghapusanPPKBController extends Controller
{
    public function create()
    {
        return view('user.penghapusan-ppkb.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namakapal' => 'required',
            'negara' => 'required',
            'noppkb' => 'required',
            'service' => 'required',
            'agen' => 'required',
            'alasan' => 'required',
        ]);

        $data['status'] = Status::PROCESS;
        NotaPPKB::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
