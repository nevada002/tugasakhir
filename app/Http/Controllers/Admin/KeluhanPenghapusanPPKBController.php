<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Status;
use App\Models\BeritaAcaraNotaPPKB;
use App\Models\NotaPPKB;
use App\Models\StatusBeritaAcara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeluhanPenghapusanPPKBController extends Controller
{
    public function index()
    {
        $status = Status::cases();
        $notaPPKBs = NotaPPKB::orderBy('id', 'asc')->get();
        return view('admin.penghapusan-ppkb.keluhan.index', compact('notaPPKBs', 'status'));
    }

    public function process(Request $request, $id)
    {
        $notaKapal = NotaPPKB::find($id)->first();
        $notaKapal->update([
            'status' => $request->status
        ]);
        // $beritaAcaraNotaKapal = BeritaAcaraNotaKapal::where('nota_id', $id)->first();

        // $check_hasil = Hasil::where('jenis_berita_acara', $notaKapal->deskripsi)->first();
        // if ($check_hasil) {
        //     $check_hasil->jenis_berita_acara = $notaKapal->deskripsi;
        //     $check_hasil->no_berita_acara = $beritaAcaraNotaKapal->nomor_surat;
        //     $check_hasil->status = $request->status;
        //     $check_hasil->save();
        //     if ($check_hasil) {
        //         $notaKapal->status = $request->status;
        //         $notaKapal->save();
        //     }
        // } else {
        //     $hasil = new Hasil;
        //     $hasil->jenis_berita_acara = $notaKapal->deskripsi;
        //     $hasil->no_berita_acara = $beritaAcaraNotaKapal->nomor_surat;
        //     $hasil->status = $request->status;
        //     $hasil->save();
        //     if ($hasil) {
        //         $notaKapal->status = $request->status;
        //         $notaKapal->save();
        //     }
        // }
    }
}
