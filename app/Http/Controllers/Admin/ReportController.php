<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Hasil::latest()->get();
        return view('admin.report', compact('reports'));
    }
}
