<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pengajuan Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .kop {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #111;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 70px;
            margin-right: 15px;
        }

        .logo-center {
            width: 40px;
            height: 40px;
            display: block;
            justify-content: center;
            margin: 0 auto 6px auto;
        }

        .kop-text {
            text-align: center;
            flex: 1;
        }

        .kop-text h1 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .kop-text h2 {
            margin: 3px 0;
            font-size: 14px;
        }

        .kop-text p {
            margin: 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #f3f4f6;
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
            font-weight: bold;
        }

        td {
            border: 1px solid #333;
            padding: 6px;
        }

        .summary {
            margin-top: 20px;
            font-weight: bold;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
            margin-right: 40px;
        }

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
        <img src="{{ public_path('images/logo-smk.png') }}" class="logo-center">

        <h1>Inventaris SMK Negeri 1 Kota Bekasi</h1>
        <h2>Laporan Peminjaman Barang</h2>
        <p>Periode {{ $namaBulan }} {{ $tahun }}</p>
    </div>
    @if ($data->count() > 0)
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Tanggal Pengajuan</th>
                    <th width="30%">Nama Barang</th>
                    <th width="20%">Pengaju</th>
                    <th width="10%">Jumlah</th>
                    <th width="20%">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td style="text-align: center">{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d/m/Y') }}</td>
                        <td>{{ $item->barang->nama_barang ?? ($item->nama_barang ?? '-') }}</td>
                        <td>{{ $item->pengaju->nama ?? '-' }}</td>
                        <td style="text-align: center">{{ $item->jumlah }}</td>
                        <td style="text-align: center">{{ ucfirst($item->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p><strong>Total Transaksi: {{ $data->count() }}</strong></p>
        </div>

        <div class="signature">
            <p>{{ now()->locale('id')->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,</p>
            <br><br><br>
            <p>______________________</p>
            <p>Kepala Sekolah</p>
        </div>
    @else
        <div class="no-data">
            <p>Tidak ada data pengajuan pada periode {{ $namaBulan }} {{ $tahun }}</p>
        </div>
    @endif
</body>

</html>
