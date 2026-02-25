<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pemeliharaan Barang</title>
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
            padding: 20px;
        }

        /* KOP SURAT */
        .kop {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #111;
            padding-bottom: 8px;
            margin-bottom: 12px;
        }

        .kop-logo {
            width: 65px;
            margin-right: 12px;
        }

        .kop-text {
            text-align: center;
            flex: 1;
            line-height: 1.4;
        }

        .kop-text .instansi {
            font-size: 9px;
            text-transform: uppercase;
        }

        .kop-text .nama-sekolah {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .kop-text .alamat {
            font-size: 8.5px;
        }

        /* JUDUL */
        .judul {
            text-align: center;
            margin: 12px 0 10px 0;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .periode {
            text-align: center;
            font-size: 11px;
            margin-bottom: 14px;
        }

        /* TABEL */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 10.5px;
        }

        th {
            background: #f0f0f0;
            border: 1px solid #333;
            padding: 5px 6px;
            text-align: center;
            font-weight: bold;
        }

        td {
            border: 1px solid #333;
            padding: 5px 6px;
            vertical-align: middle;
        }

        td.center {
            text-align: center;
        }

        td.paraf {
            text-align: center;
            height: 24px;
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


        /* SUMMARY */
        .summary {
            margin-top: 14px;
            font-size: 11px;
            font-weight: bold;
        }

        /* TANDA TANGAN */
        .signature {
            margin-top: 40px;
            text-align: right;
            margin-right: 30px;
            font-size: 11px;
            line-height: 1.6;
        }

        /* NO DATA */
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }

        /* PAGE BREAK */
        .page-break {
            page-break-after: always;
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
    
    {{-- JUDUL --}}
    <div class="judul">Laporan Pemeliharaan Barang</div>
    <div class="periode">Periode {{ $namaBulan }} {{ $tahun }}</div>

    @if ($data->count() > 0)

        {{-- TABEL --}}
        <table>
            <thead>
                <tr>
                    <th rowspan="2" width="4%">No</th>
                    <th rowspan="2" width="12%">Hari/Tanggal</th>
                    <th rowspan="2" width="20%">Nama Barang</th>
                    <th rowspan="2" width="10%">Kode Barang</th>
                    <th rowspan="2" width="24%">Kegiatan Pemeliharaan</th>
                    <th colspan="2" width="18%">Pelaksana</th>
                    <th rowspan="2" width="12%">Keterangan</th>
                </tr>
                <tr>
                    <th width="12%">Nama</th>
                    <th width="8%">Paraf</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $item)
                    <tr>
                        <td class="center">{{ $i + 1 }}</td>
                        <td class="center">
                            {{ \Carbon\Carbon::parse($item->tanggal_pemeliharaan)->translatedFormat('l, d/m/Y') }}
                        </td>
                        <td>{{ $item->barang->dataBarang->nama_barang ?? '-' }}</td>
                        <td class="center">{{ $item->kode_barang }}</td>
                        <td>{{ $item->kegiatan_pemeliharaan }}</td>
                        <td class="center">{{ $item->penanggungjawab->nama ?? '-' }}</td>
                        <td class="paraf"></td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                @endforeach

                {{-- Baris kosong tambahan jika data sedikit --}}
                @for ($j = $data->count(); $j < 15; $j++)
                    <tr>
                        <td class="center">{{ $j + 1 }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="paraf"></td>
                        <td></td>
                    </tr>
                @endfor
            </tbody>
        </table>

        {{-- SUMMARY --}}
        <div class="summary">
            Total Pemeliharaan: {{ $data->count() }} kegiatan
        </div>

        {{-- TANDA TANGAN --}}
        <div class="signature">
            <p>Bekasi, {{ now()->locale('id')->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,</p>
            <br><br><br>
            <p>______________________</p>
            <p>Petugas Inventaris</p>
        </div>
    @else
        <div class="no-data">
            Tidak ada data pemeliharaan pada periode {{ $namaBulan }} {{ $tahun }}
        </div>
    @endif

</body>

</html>
