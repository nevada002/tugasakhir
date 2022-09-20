<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Status;
use App\Models\Hasil;
use App\Models\NotaPPKB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeluhanPenghapusanPPKBController extends Controller
{
    public function index()
    {
        $status = Status::cases();
        $notaPPKBs = NotaPPKB::where('status', Status::PROCESS)->orderBy('id', 'asc')->get();
        return view('admin.penghapusan-ppkb.keluhan.index', compact('notaPPKBs', 'status'));
    }

    public function process(Request $request, $id)
    {
        $nota = NotaPPKB::findOrFail($id);
        $hasil = Hasil::where('no_keluhan', $nota->no_keluhan)->first();
        
        if (!$nota || !$hasil) {
            return response()->json([
                'message' => 'Request tidak valid'
            ], 400);
        }

        if (
            !$nota->berita_acara || 
            !$nota->berita_acara->penanda_tangan_time || 
            !$nota->berita_acara->pihak_verifikasi_time
        ) {
            return response()->json([
                'message' => 'Penanda tangan atau pihak verifikasi belum malakukan persetujuan!'
            ], 400);
        }

        $nota->update([
            'status' => $request->status
        ]);

        $hasil->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json([
            'message' => 'Sukses' 
        ]);
    }
}
