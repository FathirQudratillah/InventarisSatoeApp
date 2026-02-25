<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pengajuan Barang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #111;
            padding: 24px 30px;
        }

        /* KOP */
        .kop {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #111;
            padding-bottom: 8px;
            margin-bottom: 14px;
        }

        .kop-logo {
            width: 65px;
            margin-right: 12px;
        }

        .kop-text {
            text-align: center;
            flex: 1;
            line-height: 1.5;
        }

        .kop-text .instansi {
            font-size: 9px;
            text-transform: uppercase;
        }

        .kop-text .nama-sekolah {
            font-size: 17px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-text .alamat {
            font-size: 8.5px;
        }

        /* INFO SURAT */
        .info-surat {
            display: flex;
            justify-content: space-between;
            margin: 14px 0 10px 0;
            font-size: 11px;
        }

        .info-kiri table,
        .info-kanan table {
            border: none;
            font-size: 11px;
        }

        .info-kiri td,
        .info-kanan td {
            border: none;
            padding: 2px 4px;
            vertical-align: top;
        }

        .info-kiri .label {
            width: 70px;
        }

        .info-kiri .titik {
            width: 10px;
        }

        /* KALIMAT PEMBUKA */
        .pembuka {
            margin: 14px 0 10px 0;
            font-size: 11px;
        }

        /* TABEL */
        table.main {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 10.5px;
        }

        table.main th {
            background: #f0f0f0;
            border: 1px solid #333;
            padding: 5px 6px;
            text-align: center;
            font-weight: bold;
        }

        table.main td {
            border: 1px solid #333;
            padding: 5px 6px;
            vertical-align: middle;
        }

        table.main td.center {
            text-align: center;
        }

        .kop {
            border-bottom: 3px solid #111;
            padding-bottom: 8px;
            margin-bottom: 12px;
            text-align: center;
        }

        .kop-logo {
            width: 65px;
            display: block;
            margin: 0 auto 6px auto;
        }

        .kop-text {
            text-align: center;
            line-height: 1.5;
        }


        /* TANDA TANGAN */
        .ttd-wrapper {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            font-size: 11px;
        }

        .ttd-box {
            text-align: center;
            width: 200px;
            line-height: 1.6;
        }

        .ttd-box .garis {
            margin-top: 50px;
            border-top: 1px solid #111;
            padding-top: 4px;
        }

        /* NO DATA */
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>

<body>

    {{-- KOP SURAT --}}
    <div class="kop">
        <div class="kop-text">
            <img src="{{ public_path('images/logo-smk.png') }}" class="kop-logo">
            <div class="instansi">Pemerintah Daerah Provinsi Jawa Barat</div>
            <div class="instansi">Dinas Pendidikan</div>
            <div class="instansi">Cabang Dinas Pendidikan Wilayah III</div>
            <div class="nama-sekolah">SMK Negeri 1 Kota Bekasi</div>
            <div class="alamat">Jln. Bintara VIII No. 2 Kec. Bekasi Barat Kota Bekasi 17134 Tlp/Fax : (021) 88951151
            </div>
            <div class="alamat">Website : http://www.smkn1kotabekasi.sch.id &nbsp; Email : info@smkn1kotabekasi.sch.id
            </div>
        </div>
    </div>

    {{-- INFO SURAT --}}
    <div class="info-surat">
        <div class="info-kiri">
            <table>
                <tr>
                    <td class="label">Nomor</td>
                    <td class="titik">:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="label">Sifat</td>
                    <td class="titik">:</td>
                    <td>Biasa</td>
                </tr>
                <tr>
                    <td class="label">Lampiran</td>
                    <td class="titik">:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="label">Perihal</td>
                    <td class="titik">:</td>
                    <td>Permintaan Barang — Periode {{ $namaBulan }} {{ $tahun }}</td>
                </tr>
            </table>
        </div>
        <div class="info-kanan">
            <table>
                <tr>
                    <td>Bekasi,</td>
                    <td>{{ now()->locale('id')->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Kepada</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Yth.</td>
                    <td>Kepala SMKN1 Kota Bekasi</td>
                </tr>
                <tr>
                    <td></td>
                    <td>di Tempat</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- KALIMAT PEMBUKA --}}
    <div class="pembuka">
        Bersama ini kami sampaikan permohonan barang yang dibutuhkan sebagai berikut :
    </div>

    @if ($data->count() > 0)

        {{-- TABEL --}}
        <table class="main">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="40%">Nama Barang</th>
                    <th width="10%">Jumlah</th>
                    <th width="15%">Satuan</th>
                    <th width="15%">Status</th>
                    <th width="15%">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $item)
                    <tr>
                        <td class="center">{{ $i + 1 }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td class="center">{{ $item->jumlah_pengajuan }}</td>
                        <td class="center">unit</td>
                        <td class="center">{{ $item->status_pengajuan ?? 'pending' }}</td>
                        <td></td>
                    </tr>
                @endforeach

                {{-- Baris kosong tambahan --}}
                @for ($j = $data->count(); $j < 10; $j++)
                    <tr>
                        <td class="center">{{ $j + 1 }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            </tbody>
        </table>

        {{-- TANDA TANGAN --}}
        <div class="ttd-wrapper">
            <div class="ttd-box">
                <div>Peruntukan : _______________</div>
                <div style="margin-top:6px;">Pemohon</div>
                <div class="garis">______________________</div>
                <div>NIP. ______________________</div>
            </div>
            <div class="ttd-box">
                <div>Peruntukan : _______________</div>
                <div style="margin-top:6px;">Mengetahui,</div>
                <div class="garis">______________________</div>
                <div>NIP. ______________________</div>
            </div>
        </div>
    @else
        <div class="no-data">
            Tidak ada data pengajuan pada periode {{ $namaBulan }} {{ $tahun }}
        </div>
    @endif

</body>

</html>
