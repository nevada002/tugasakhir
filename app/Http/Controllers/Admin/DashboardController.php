<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Status;
use App\Models\BeritaAcaraNotaKapal;
use App\Models\BeritaAcaraNotaPPKB;
use App\Models\BeritaAcaraNotaSampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAgen = User::totalAgen();

        $totalBaNotaKapal = BeritaAcaraNotaKapal::count();
        $disetujuiBaNotaKapal = Hasil::notaKapal()->approved()->count();
        $ditolakBaNotaKapal = Hasil::notaKapal()->rejected()->count();

        $totalBaNotaSampah = BeritaAcaraNotaSampah::count();
        $disetujuiBaNotaSampah = Hasil::notaSampah()->approved()->count();
        $ditolakBaNotaSampah = Hasil::notaSampah()->rejected()->count();

        $totalBaPPKB = BeritaAcaraNotaPPKB::count();
        $disetujuiBaPPKB = Hasil::notaPPKB()->approved()->count();
        $ditolakBaPPKB = Hasil::notaPPKB()->rejected()->count();

        $charts = [
            ['', 'Total', 'Disetujui', 'Ditolak'],
            ['Berita Acara Nota Kapal', $totalBaNotaKapal, $disetujuiBaNotaKapal, $ditolakBaNotaKapal],
            ['Berita Acara Nota Sampah Kapal', $totalBaNotaSampah, $disetujuiBaNotaSampah, $ditolakBaNotaSampah],
            ['Berita Acara Penghapusan PPKB', $totalBaPPKB, $disetujuiBaPPKB, $ditolakBaPPKB],
        ];

        return view('admin.dashboard', compact('totalAgen', 'totalBaNotaKapal', 'totalBaNotaSampah', 'totalBaPPKB', 'charts'));
    }
}
