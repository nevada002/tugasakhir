<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Status;
use App\Models\BeritaAcaraNotaKapal;
use App\Models\Hasil;
use App\Models\NotaKapal;
use App\Models\StatusBeritaAcara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeluhanNotaKapalController extends Controller
{
    public function index()
    {
        $status = Status::cases();
        $notaKapals = NotaKapal::where('status', Status::PROCESS)->orderBy('id', 'asc')->get();
        return view('admin.nota-kapal.keluhan.index', compact('notaKapals', 'status'));
    }

    public function process(Request $request, $id)
    {
        $notaKapal = NotaKapal::find($id);
        $hasil = Hasil::where('no_keluhan', $notaKapal->no_keluhan)->first();
        
        if (!$notaKapal || !$hasil) {
            return response()->json([
                'message' => 'Request tidak valid'
            ], 400);
        }

        // return $notaKapal->berita_acara;

        if (
            !$notaKapal->berita_acara || 
            !$notaKapal->berita_acara->penanda_tangan_time || 
            !$notaKapal->berita_acara->pihak_verifikasi_time
        ) {
            return response()->json([
                'message' => 'Penanda tangan atau pihak verifikasi belum malakukan approval!'
            ], 400);
        }

        $notaKapal->update([
            'status' => $request->status
        ]);

        $hasil->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Sukses' 
        ]);
    }
}
