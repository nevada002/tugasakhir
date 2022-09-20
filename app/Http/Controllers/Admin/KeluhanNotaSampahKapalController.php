<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Status;
use App\Models\Hasil;
use App\Models\NotaSampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeluhanNotaSampahKapalController extends Controller
{
    public function index()
    {
        $status = Status::cases();
        $notaSampahs = NotaSampah::where('status', Status::PROCESS)->orderBy('id', 'asc')->get();
        return view('admin.nota-sampah-kapal.keluhan.index', compact('notaSampahs', 'status'));
    }

    public function process(Request $request, $id)
    {
        $nota = NotaSampah::findOrFail($id);
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
