<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Role;
use App\Enum\Status;
use App\Models\BeritaAcaraNotaSampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\NotaSampah;
use App\Models\User;

class BeritaAcaraNotaSampahKapalController extends Controller
{
    public function index()
    {
        $beritaAcaras = BeritaAcaraNotaSampah::query();
        $beritaAcaras->whereHas('nota', function ($q) {
            $q->where('status', Status::PROCESS);
        });

        if (!auth()->user()->isCustomerService()) {
            $beritaAcaras->where(function ($q) {
                $q->where('penanda_tangan_id', auth()->id());
                $q->orWhere('pihak_verifikasi_id', auth()->id());
            });
        }
        $beritaAcaras = $beritaAcaras->get();

        return view('admin.nota-sampah-kapal.berita-acara.index', compact('beritaAcaras'));
    }

    public function create()
    {
        $pihakVerifikasi = User::where('role', Role::VERIFICATOR)->get();
        $penandaTangan = User::where('role', Role::SIGNER)->get();
        $nota = NotaSampah::get();
        return view('admin.nota-sampah-kapal.berita-acara.create', compact('nota', 'pihakVerifikasi', 'penandaTangan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nota_id' => 'required',
            // 'nomor_surat' => 'required',
            'tanggal' => 'required',
            'tanggalnotasampahkapal' => 'required',
            'dibuatoleh' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
            'penanda_tangan_id' => 'required',
            'pihak_verifikasi_id' => 'required',
        ]);

        $nota = NotaSampah::find($request->nota_id);
        if (!$nota) {
            return redirect()->back()->withErrors(['nota_id' => 'Nota kapal tidak ditemukan']);
        }

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        $validated['lampiranpendukung'] = $fileName;
        $validated['nomor_surat'] = $nota->no_berita_acara;
        $beritaAcara = BeritaAcaraNotaSampah::create($validated);

        Hasil::query()
            ->where('no_keluhan', $nota->no_keluhan)
            ->first()
            ->update([
                'berita_acara_type' => get_class($beritaAcara),
                'berita_acara_id' => $beritaAcara->id,
                'no_berita_acara' => $nota->no_berita_acara
            ]);

        return redirect()
            ->route('admin.nota-sampah-kapal.berita-acara.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function approval(Request $request, $id)
    {
        $data = [];
        $keyStatus = $request->role == Role::SIGNER->value ? 'penanda_tangan_status' : 'pihak_verifikasi_status';
        $keyTime = $request->role == Role::SIGNER->value ? 'penanda_tangan_time' : 'pihak_verifikasi_time';

        $data[$keyStatus] = $request->status;
        $data[$keyTime] = now();

        BeritaAcaraNotaSampah::findOrFail($id)->update($data);

        return response()->json([
            'message' => 'Sukses'
        ]);
    }

    public function show(Request $request, $id)
    {
        $beritaAcara = BeritaAcaraNotaSampah::with('nota')->findOrFail($id);
        return view('admin.nota-sampah-kapal.berita-acara.show', compact('beritaAcara'));
    }

    public function edit($id)
    {
        $beritaAcara = BeritaAcaraNotaSampah::findOrFail($id);
        $pihakVerifikasi = User::where('role', Role::VERIFICATOR)->get();
        $penandaTangan = User::where('role', Role::SIGNER)->get();
        $nota = NotaSampah::whereDoesntHave('berita_acara')->get();
        return view('admin.nota-sampah-kapal.berita-acara.edit', compact('beritaAcara', 'nota', 'pihakVerifikasi', 'penandaTangan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tanggal' => 'required',
            'tanggalnotasampahkapal' => 'required',
            'dibuatoleh' => 'required',
            'lampiranpendukung' => ['nullable', 'mimes:pdf', 'max:2048'],
            'penanda_tangan_id' => 'required',
            'pihak_verifikasi_id' => 'required',
        ]);

        if ($request->lampiranpendukung) {
            $file = $request->file('lampiranpendukung');
            $fileName = $file->getClientOriginalName();
            $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);
            $data['lampiranpendukung'] = $fileName;
        }

        BeritaAcaraNotaSampah::findOrFail($id)->update($data);

        return redirect()
            ->route('admin.nota-sampah-kapal.berita-acara.index')
            ->with('success', 'Data berhasil diperbarui');
    }
}
