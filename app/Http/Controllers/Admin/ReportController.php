<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Enum\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {        
        $reports = Hasil::query()
            ->with('berita_acara:id,pic,penanda_tangan_status,pihak_verifikasi_status');

        if ($request->start && $request->end) {
            $start = Carbon::createFromFormat('Y-m-d', $request->start);
            $end = Carbon::createFromFormat('Y-m-d', $request->end);

            $reports->whereDate('created_at', '>=', $start);
            $reports->whereDate('created_at', '<=', $end);
        }

        $reports = $reports->latest()->get();
        return view('admin.report', compact('reports'));
    }

    public function pdf($id)
    {
        $hasil = Hasil::query()
            ->with('berita_acara.pihak_verifikasi', 'berita_acara.penanda_tangan', 'berita_acara.nota', 'agen')
            ->whereHas('berita_acara')
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
