<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcaraNotaKapal;
use App\Models\Hasil;
use App\Models\NotaKapal;
use App\Models\StatusBeritaAcara;
use Illuminate\Http\Request;

class NotaKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusBeritaAcara::all();
        $notaKapals = NotaKapal::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacaranotakapal.keluhan.index', compact('notaKapals', 'status'));
    }

    public function index2()
    {
        $notaKapals = BeritaAcaraNotaKapal::orderBy('id', 'asc')->get();
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.index', compact('notaKapals'));
    }

    // read pdf file from storage
    public function readPdf($id)
    {
        $notaKapal = NotaKapal::find($id);
        $path = storage_path('app/public/filelampiranpendukung' . $notaKapal->lampiranpendukung);
        return response()->file($path);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('pages.user.form.notakapal.index');
    }

    public function create2()
    {
        $notaKapal = NotaKapal::all();
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.create', compact('notaKapal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namakapal' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        NotaKapal::create([
            'namakapal' => $request->namakapal,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'lampiranpendukung' => $fileName,
            'status_id' => 1,
        ]);
        return redirect('/formnotakapal')->with('success', 'Data berhasil ditambahkan');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'nama_perusahaan' => 'required',
            'no_surat_perusahaan' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
            'nota_kapal_id' => 'required',
            'dibuatoleh' => 'required',
            'keterangan' => 'required',
            'lampiranpendukung' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $file = $request->file('lampiranpendukung');
        $fileName = $file->getClientOriginalName();
        $request->file('lampiranpendukung')->storeAs('public/filelampiranpendukung', $fileName);

        BeritaAcaraNotaKapal::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'nama_perusahaan' => $request->nama_perusahaan,
            'no_surat_perusahaan' => $request->no_surat_perusahaan,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'nota_kapal_id' => $request->nota_kapal_id,
            'dibuatoleh' => $request->dibuatoleh,
            'keterangan' => $request->keterangan,
            'lampiranpendukung' => $fileName,
        ]);

        return redirect('/suratnotakapal')->with('success', 'Data berhasil ditambahkan');
    }

    public function store3($id, $statusId)
    {
        $notaKapal = NotaKapal::where('id', $id)->first();
        $beritaAcaraNotaKapal = BeritaAcaraNotaKapal::where('nota_kapal_id', $id)->first();

        $check_hasil = Hasil::where('jenis_berita_acara', $notaKapal->deskripsi)->first();
        if ($check_hasil) {
            $check_hasil->jenis_berita_acara = $notaKapal->deskripsi;
            $check_hasil->no_berita_acara = $beritaAcaraNotaKapal->nomor_surat;
            $check_hasil->status_id = $statusId;
            $check_hasil->save();
            if ($check_hasil) {
                $notaKapal->status_id = $statusId;
                $notaKapal->save();
            }
        } else {
            $hasil = new Hasil;
            $hasil->jenis_berita_acara = $notaKapal->deskripsi;
            $hasil->no_berita_acara = $beritaAcaraNotaKapal->nomor_surat;
            $hasil->status_id = $statusId;
            $hasil->save();
            if ($hasil) {
                $notaKapal->status_id = $statusId;
                $notaKapal->save();
            }
        }
        // $hasil = Hasil::create([
        //     'no_berita_acara' => $beritaAcaraNotaKapal->nomor_surat,
        //     'jenis_berita_acara' => $notaKapal->deskripsi,
        //     'status_id' => $statusId,
        // ]);


        // return redirect('/beritaacaranotakapal')->with('success', 'Data berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notaKapal = BeritaAcaraNotaKapal::find($id);
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.show', compact('notaKapal'));
    }

    public function show2($id)
    {
        $notaKapal = BeritaAcaraNotaKapal::find($id);
        return view('pages.admin.beritaacara.beritaacaranotakapal.surat.edit', compact('notaKapal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NotaKapal::find($id)->delete();
        return redirect('/suratnotakapal')->with('success', 'Data berhasil dihapus');
    }
}
