<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Role;
use App\Models\BeritaAcaraNotaKapal;
use App\Models\NotaKapal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\User;

class BeritaAcaraNotaKapalController extends Controller
{
    public function index()
    {
        $beritaAcaras = BeritaAcaraNotaKapal::query();
        // $beritaAcaras->where(function($q) {
        //     $q->whereNull('penanda_tangan_time');
        //     $q->orWhereNull('pihak_verifikasi_time');
        // });

        if (!auth()->user()->isCustomerService()) {
            $beritaAcaras->where(function($q) {
                $q->where('penanda_tangan_id', auth()->id());
                $q->orWhere('pihak_verifikasi_id', auth()->id());
            });
        }
        $beritaAcaras = $beritaAcaras->get();

        return view('admin.nota-kapal.berita-acara.index', compact('beritaAcaras'));
    }

    public function create()
    {
        $pihakVerifikasi = User::where('role', Role::VERIFICATOR)->get();
        $penandaTangan = User::where('role', Role::SIGNER)->get();
        $notaKapal = NotaKapal::whereDoesntHave('berita_acara')->get();
        return view('admin.nota-kapal.berita-acara.create', compact('notaKapal', 'pihakVerifikasi', 'penandaTangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'nomor_surat' => 'required',
            'tanggal' => 'required',
            'nama_perusahaan' => 'required',
            'no_surat_perusahaan' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
            'nota_id' => 'required',
            'dibuatoleh' => 'required',
            'keterangan' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
            'penanda_tangan_id' => 'required',
            'pihak_verifikasi_id' => 'required',
        ]);

        $notaKapal = NotaKapal::find($request->nota_id);
        if (!$notaKapal) {
            return redirect()->back()->withErrors(['nota_id' => 'Nota kapal tidak ditemukan']);
        }

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        $beritaAcara = BeritaAcaraNotaKapal::create([
            'nota_id' => $request->nota_id,
            'nomor_surat' => $notaKapal->no_berita_acara,
            'tanggal' => $request->tanggal,
            'nama_perusahaan' => $request->nama_perusahaan,
            'no_surat_perusahaan' => $request->no_surat_perusahaan,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'dibuatoleh' => $request->dibuatoleh,
            'keterangan' => $request->keterangan,
            'lampiranpendukung' => $fileName,
            'penanda_tangan_id' => $request->penanda_tangan_id,
            'pihak_verifikasi_id' => $request->pihak_verifikasi_id,
        ]);

        Hasil::query()
            ->where('no_keluhan', $notaKapal->no_keluhan)
            ->first()
            ->update([
                'berita_acara_type' => get_class($beritaAcara),
                'berita_acara_id' => $beritaAcara->id,
                'no_berita_acara' => $notaKapal->no_berita_acara
            ]);

        return redirect()
            ->route('admin.nota-kapal.berita-acara.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function approval(Request $request, $id)
    {
        $data = [];
        $keyStatus = $request->role == Role::SIGNER->value ? 'penanda_tangan_status' : 'pihak_verifikasi_status';
        $keyTime = $request->role == Role::SIGNER->value ? 'penanda_tangan_time' : 'pihak_verifikasi_time';

        $data[$keyStatus] = $request->status;
        $data[$keyTime] = now();

        BeritaAcaraNotaKapal::findOrFail($id)->update($data);

        return response()->json([
            'message' => 'Sukses' 
        ]);
    }

    public function show($id)
    {
        // $hasil = Hasil::query()
        //     ->with('berita_acara.pihak_verifikasi', 'berita_acara.penanda_tangan', 'berita_acara.nota', 'agen')
        //     ->whereHas('berita_acara')
        //     ->where('status', Status::APPROVED)
        //     ->findOrFail($id);

        // $created_at = $hasil->berita_acara->created_at->locale('id');
        // $status_pihak_verifikasi = Status::from($hasil->berita_acara->pihak_verifikasi_status)->label();
        // $status_penanda_tangan = Status::from($hasil->berita_acara->penanda_tangan_status)->label();

        // $pdf = Pdf::loadView('pdf.nota-kapal', compact('hasil', 'created_at', 'status_pihak_verifikasi', 'status_penanda_tangan'));
        // return $pdf->stream();
    }
}
