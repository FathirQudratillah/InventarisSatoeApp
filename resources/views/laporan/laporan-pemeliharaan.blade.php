<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-w-7xl mx-auto px-6 py-10 space-y-8">

        {{-- HERO HEADER --}}
        <div class="rounded-3xl p-8 text-white shadow-lg bg-gray-900">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">Laporan Pemeliharaan</h1>
                    <p class="opacity-80">Periode {{ $namaBulan }} {{ $tahun }}</p>
                </div>
                <a href="{{ route('laporan.index') }}"
                    class="bg-white/20 hover:bg-white/30 backdrop-blur px-5 py-2 rounded-xl">
                    Kembali
                </a>
            </div>
        </div>

        {{-- SUMMARY CARD --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-400 text-sm">Total Pemeliharaan</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $data->count() }}</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-400 text-sm">Jumlah Barang Dipelihara</p>
                <h2 class="text-3xl font-bold text-blue-500">
                    {{ $data->unique('kode_barang')->count() }}
                </h2>
            </div>
        </div>

        {{-- FILTER --}}
        <div class="bg-white p-6 rounded-2xl shadow flex flex-col md:flex-row gap-4 items-end">
            <form method="GET" action="{{ route('laporan.laporan-pemeliharaan') }}"
                class="flex flex-col md:flex-row gap-4 w-full">

                <select name="bulan" class="rounded-xl border-gray-300">
                    @foreach ([
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ] as $k => $v)
                        {{-- FIX: bandingkan $bulan bukan $namaBulan --}}
                        <option value="{{ $k }}" {{ $bulan == $k ? 'selected' : '' }}>
                            {{ $v }}
                        </option>
                    @endforeach
                </select>

                <select name="tahun" class="rounded-xl border-gray-300">
                    @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>

                <button class="bg-yellow-500 text-white px-6 py-2 rounded-xl shadow hover:bg-amber-600">
                    Filter
                </button>

                {{-- FIX: kirim $bulan (angka) bukan $namaBulan (string) --}}
                <a href="{{ route('laporan.pemeliharaan.cetak', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
                    class="bg-red-600 text-white px-6 py-2 rounded-xl shadow hover:bg-red-700">
                    Cetak PDF
                </a>

            </form>
        </div>

        {{-- TABLE --}}
        <div class="bg-white rounded-3xl shadow overflow-hidden">
            <div class="px-8 py-6 border-b">
                <h3 class="font-semibold text-gray-700">Daftar Pemeliharaan</h3>
            </div>

            @if ($data->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-gray-500">
                            <tr>
                                <th class="px-8 py-4 text-left">No</th>
                                <th class="px-8 py-4 text-left">Tanggal</th>
                                <th class="px-8 py-4 text-left">Kode Barang</th>
                                <th class="px-8 py-4 text-left">Nama Barang</th>
                                <th class="px-8 py-4 text-left">Penanggung Jawab</th>
                                <th class="px-8 py-4 text-left">Kegiatan Pemeliharaan</th>
                                <th class="px-8 py-4 text-left">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($data as $i => $item)
                                <tr class="hover:bg-yellow-50 transition">
                                    <td class="px-8 py-4">{{ $i + 1 }}</td>
                                    <td class="px-8 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pemeliharaan)->format('d M Y') }}
                                    </td>
                                    <td class="px-8 py-4">{{ $item->kode_barang }}</td>
                                    <td class="px-8 py-4 font-semibold">
                                        {{ $item->barang->dataBarang->nama_barang ?? '-' }}
                                    </td>
                                    <td class="px-8 py-4">{{ $item->penanggungjawab->nama ?? '-' }}</td>
                                    <td class="px-8 py-4">{{ $item->kegiatan_pemeliharaan }}</td>
                                    <td class="px-8 py-4">{{ $item->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <p class="text-sm text-gray-700">Total: <span class="font-semibold">{{ $data->count() }}</span>
                        transaksi pemeliharaan</p>
                </div>
            @else
                <div class="py-20 text-center text-gray-400">
                    Tidak ada data pemeliharaan pada periode ini
                </div>
            @endif
        </div>

    </div>
</body>

</html>
