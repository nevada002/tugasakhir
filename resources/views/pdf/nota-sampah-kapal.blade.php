<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BERITA ACARA NOTA SAMPAH KAPAL</title>
</head>
<body>
    <h3 style="text-align: center; margin-bottom: 0;">BERITA ACARA NOTA SAMPAH KAPAL</h3>
    <p style="text-align: center; margin-top: 4px;">Nomor: {{ $hasil->no_berita_acara }}</p>
    <br>
    <p>Pada hari ini {{ $created_at->isoFormat('dddd') }} tanggal {{ $created_at->isoFormat('D') }} bulan {{ $created_at->isoFormat('M') }} tahun {{ $created_at->isoFormat('YYYY') }}, yang bertanda tangan dibawah ini kami, dengan ini menyatakan:</p>
    <ol style="padding-left: 17;">
        <li>Menunjuk Nota Penjualan Kepelabuhan Pelayanan Sampah Kapal yang terbit tanggal {{ $hasil->berita_acara->tanggalnotasampahkapal->locale('id')->isoFormat('DD MMMM YYYY') }} sebagaimana Daftar terlampir.</li>
        <li>Setelah diadakan penelitian dapat dijelaskan bahwa terdapat kesalahan sistem yang membuat Penerimaan Pajak Negara (PPN) tidak tertagih pada Nota Penjualan Jasa Kepelabuhan Pelayanan Sampah Kapal yang terbit tanggal {{ $hasil->berita_acara->tanggalnotasampahkapal->locale('id')->isoFormat('DD MMMM YYYY') }}</li>
        <li>Sehubungan butir 2 (dua) tersebut di atas, dimohon agar dapat dilakukan koreksi pada sistem Nota Penjualan Jasa Kepelabuhan Pelayanan Sampah Kapal yang terbit tangagal {{ $hasil->berita_acara->tanggalnotasampahkapal->locale('id')->isoFormat('DD MMMM YYYY') }} dan agar dimunculkan Pajak Penerimaan Negara (PPN) pada Nota-nota sampah kapal tersebut.</li>
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