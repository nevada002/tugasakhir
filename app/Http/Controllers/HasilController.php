<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\Hasil;
use App\Models\NotaKapal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasils = Hasil::query()
            ->with('berita_acara.penanda_tangan:id,name', 'berita_acara.pihak_verifikasi:id,name', 'nota')
            ->orderBy('id', 'asc')
            ->get();

        return view('user.hasil.index', compact('hasils'));
    }

    public function pdf($id)
    {
        $hasil = Hasil::query()
            ->with('berita_acara.pihak_verifikasi', 'berita_acara.penanda_tangan', 'berita_acara.nota', 'agen')
            ->whereHas('berita_acara')
            ->where('status', Status::APPROVED)
            ->findOrFail($id);
            
        $filename = [
            'App\Models\BeritaAcaraNotaKapal' => 'pdf.nota-kapal',
            'App\Models\BeritaAcaraNotaSampah' => 'pdf.nota-sampah-kapal',
            'App\Models\BeritaAcaraNotaPPKB' => 'pdf.penghapusan-ppkb',
        ][$hasil->berita_acara_type];

        $created_at = $hasil->berita_acara->created_at->locale('id');
        $status_pihak_verifikasi = Status::from($hasil->berita_acara->pihak_verifikasi_status)->label();
        $status_penanda_tangan = Status::from($hasil->berita_acara->penanda_tangan_status)->label();

        $pdf = Pdf::loadView($filename, compact('hasil', 'created_at', 'status_pihak_verifikasi', 'status_penanda_tangan'));
        return $pdf->stream();
    }
}
