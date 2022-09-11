<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BERITA ACARA PENGHAPUSAN PPKB</title>
</head>

<body>
    <h3 style="text-align: center; margin-bottom: 0;">BERITA ACARA PENGHAPUSAN PPKB</h3>
    <p style="text-align: center; margin-top: 4px;">Nomor: {{ $hasil->no_berita_acara }}</p>
    <p>Pada hari ini {{ $created_at->isoFormat('dddd') }} tanggal {{ $created_at->isoFormat('D') }} bulan
        {{ $created_at->isoFormat('M') }} tahun {{ $created_at->isoFormat('YYYY') }}, yang bertanda tangan dibawah ini
        kami, dengan ini menyatakan:</p>
    <div style="margin-left: 20px;">
        <table>
            <tbody>
                <tr>
                    <td>Nama Kapal</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->nama_kapal }}</td>
                </tr>
                <tr>
                    <td>No. PPKB / Ke</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->noppkb }}</td>
                </tr>
                <tr>
                    <td>Service Code</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->service_code }}</td>
                </tr>
                <tr>
                    <td>No. UKK</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->noukk }}</td>
                </tr>
                <tr>
                    <td>Agen / Kode Agen</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->agen }}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->lokasi }}</td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->tujuan }}</td>
                </tr>
                <tr>
                    <td>Alasan Penghapusan</td>
                    <td>:</td>
                    <td>{{ $hasil->berita_acara->alasan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>Demikian Berita Acara ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya dan apabila dikemudian
        hari terdapat kekeliruan dapat diperbaiki sebagaimana harusnya.</p>
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
