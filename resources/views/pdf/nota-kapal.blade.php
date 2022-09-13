<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BERITA ACARA NOTA KAPAL</title>
</head>
<body>
    <h3 style="text-align: center; margin-bottom: 0;">BERITA ACARA NOTA KAPAL</h3>
    <p style="text-align: center; margin-top: 4px;">Nomor: {{ $hasil->no_berita_acara }}</p>
    <br>
    <p>Pada hari ini {{ $created_at->isoFormat('dddd') }} tanggal {{ $created_at->isoFormat('D') }} bulan {{ $created_at->isoFormat('M') }} tahun {{ $created_at->isoFormat('YYYY') }}, yang bertanda tangan dibawah ini kami, dengan ini menyatakan:</p>
    <ol style="padding-left: 17;">
        <li>Berdasarkan surat {{ $hasil->berita_acara->nama_perusahaan }}, No: {{ $hasil->berita_acara->no_surat_perusahaan }}, tanggal {{ $hasil->berita_acara->tanggal_surat->locale('id')->isoFormat('dddd MMMM YYYY') }}, perihal: {{ $hasil->berita_acara->perihal }}</li>
        <li>
            Setelah diadakan penelitian dan evaluasi atas permohonan koreksi tersebut dapat dijelaskan sebagai berikut: {{ $hasil->berita_acara->nota->deskripsi }}
            {{-- <ol type="a" style="padding-left: 17;">
                <li>Berdasarkan Surat Keputusan Direksi PT. Pelabuhan Indonesia II (Persero) Nomor: {{ '012038038' }} atas pelayanan pandu.</li>
                <li>Pengenaan denda pasal 5.2b pada kapal {{ $hasil->berita_acara->nota->namakapal }} seharusnya tidak dikenakan, karena keterlambatan pengajuan PPKB perubahan dikarenakan adanya kendala operasional dan perbaikan kapal oleh pihak terminal Jakarta International Container Terminal (JICT)</li>
            </ol> --}}
        </li>
        <li>Sehubungan butir 2 (dua) tersebut di atas, maka permohonan koreksi atas Nota Kapal Nomor: {{ '012038038' }}, untuk koreksi pasal 5.2b SK. Dir dapat disetujui.</li>
    </ol>
    <p>Demikian Berita Acara ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya dan apabila dikemudian hari terdapat kekeliruan dapat diperbaiki sebagaimana harusnya.</p>
    <br>
    <br>
    <table style="width: 100%">
        <tbody>
            <tr>
                <td style="width: 33.3%; text-align: center; padding-bottom: 25px">
                    Verifikasi
                </td>
                <td style="width: 33.3%; text-align: center; padding-bottom: 25px">
                    Dibuat Oleh
                </td>
                <td style="width: 33.3%; text-align: center; padding-bottom: 25px">
                    Mengetahui
                </td>
            </tr>
            <tr>
                <td style="text-align: center; padding-bottom: 25px">{{ $status_pihak_verifikasi }}</td>
                <td style="text-align: center; padding-bottom: 25px"></td>
                <td style="text-align: center; padding-bottom: 25px">{{ $status_penanda_tangan }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">{{ $hasil->berita_acara->pihak_verifikasi->name }}</td>
                <td style="text-align: center;">{{ $hasil->berita_acara->dibuatoleh }}</td>
                <td style="text-align: center;">{{ $hasil->berita_acara->penanda_tangan->name }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>