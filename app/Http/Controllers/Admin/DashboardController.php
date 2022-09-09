<?php

namespace App\Http\Controllers\Admin;

use App\Models\BeritaAcaraNotaKapal;
use App\Models\BeritaAcaraNotaPPKB;
use App\Models\BeritaAcaraNotaSampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAgen = User::totalAgen();
        $totalBaNoKa = BeritaAcaraNotaKapal::getCountDataBaNoKa();
        $totalBaNoSa = BeritaAcaraNotaSampah::getCountDataBaNoSa();
        $totalBanoPPKB = BeritaAcaraNotaPPKB::getCountDataBaNoPPKB();
        return view('admin.dashboard', compact('totalAgen', 'totalBaNoKa', 'totalBaNoSa', 'totalBanoPPKB'));
    }
}
