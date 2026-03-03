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
                    <p class="opacity-80">Periode
                        @php
                            $bulanRequest = request('bulan') ? (int) request('bulan') : (int) date('m');
                            $tahunRequest = request('tahun', date('Y'));
                        @endphp
                        {{ \Carbon\Carbon::create()->month($bulanRequest)->translatedFormat('F') }}
                        {{ $tahunRequest }}
                    </p>
                </div>
                <a href="{{ route('laporan.index') }}"
                    class="bg-white/20 hover:bg-white/30 backdrop-blur px-5 py-2 rounded-xl">
                    Kembali
                </a>
            </div>
        </div>

        {{-- SUMMARY CARD --}}
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-400 text-sm">Total Pemeliharaan</p>
                <h2 class="text-3xl font-bold text-gray-800">{{ $data->count() }}</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-400 text-sm">Barang Terpelihara</p>
                <h2 class="text-3xl font-bold text-blue-500">
                    {{ $data->groupBy('kode_barang')->count() }}
                </h2>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-400 text-sm">Periode Ini</p>
                <h2 class="text-3xl font-bold text-green-500">
                    {{ \Carbon\Carbon::create()->month($bulanRequest)->translatedFormat('F') }} {{ $tahunRequest }}
                </h2>
            </div>
        </div>

        {{-- FILTER --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            {{-- FORM UNTUK FILTER --}}
            <form method="GET" action="{{ route('laporan.laporan-pemeliharaan') }}" id="filterForm"
                class="flex flex-col md:flex-row gap-4 items-end">

                <div class="flex-1">
                    <label class="text-sm text-gray-600 font-medium block mb-2">Kode Barang</label>
                    <select name="kode_barang" id="kode_barang" class="rounded-xl border-gray-300 w-full">
                        <option value="">Seluruh Barang</option>
                        @foreach ($barangList as $barang)
                            <option value="{{ $barang->kode_barang }}"
                                {{ request('kode_barang') == $barang->kode_barang ? 'selected' : '' }}>
                                {{ $barang->kode_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium block mb-2">Bulan</label>
                    <select name="bulan" id="bulan" class="rounded-xl border-gray-300">
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
                            <option value="{{ $k }}"
                                {{ request('bulan', date('m')) == $k ? 'selected' : '' }}>
                                {{ $v }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium block mb-2">Tahun</label>
                    <select name="tahun" id="tahun" class="rounded-xl border-gray-300">
                        @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                            <option value="{{ $i }}"
                                {{ request('tahun', date('Y')) == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-xl shadow hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Filter
                </button>

            </form>

            {{-- TOMBOL CETAK PDF (mengambil nilai dari filter) --}}
            <div class="mt-4 flex gap-3">
                <button onclick="cetakPDF()"
                    class="inline-flex items-center bg-red-600 text-white px-6 py-2 rounded-xl shadow hover:bg-red-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Cetak PDF
                </button>

                {{-- Info: Barang yang dipilih --}}
                @if (request('kode_barang'))
                    <div class="flex items-center text-sm text-gray-600 bg-blue-50 px-4 py-2 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Format: <strong>Kartu Pemeliharaan {{ request('kode_barang') }}</strong></span>
                    </div>
                @else
                    <div class="flex items-center text-sm text-gray-600 bg-green-50 px-4 py-2 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Format: <strong>Laporan Rekap Seluruh Barang</strong></span>
                    </div>
                @endif
            </div>
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
                                <th class="px-8 py-4 text-left">Kegiatan Pemeliharaan</th>
                                <th class="px-8 py-4 text-left">Penanggung Jawab</th>
                                <th class="px-8 py-4 text-left">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($data as $i => $item)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-8 py-4">{{ $i + 1 }}</td>
                                    <td class="px-8 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pemeliharaan)->format('d M Y') }}
                                    </td>
                                    <td class="px-8 py-4 font-semibold">{{ $item->kode_barang }}</td>
                                    <td class="px-8 py-4">{{ $item->jenis->barang->nama_barang ?? '-' }}</td>
                                    <td class="px-8 py-4">{{ $item->kegiatan_pemeliharaan }}</td>
                                    <td class="px-8 py-4">{{ $item->penanggungjawab->nama ?? '-' }}</td>
                                    <td class="px-8 py-4">
                                        <span class="text-xs text-gray-600">{{ $item->keterangan ?? '-' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="py-20 text-center text-gray-400">
                    Tidak ada data pemeliharaan
                </div>
            @endif
        </div>

    </div>

    {{-- JavaScript untuk Cetak PDF --}}
    <script>
        function cetakPDF() {
            // Ambil nilai dari form
            const kodeBarang = document.getElementById('kode_barang').value;
            const bulan = document.getElementById('bulan').value;
            const tahun = document.getElementById('tahun').value;

            // Buat URL dengan parameter
            const url = new URL('{{ route('laporan.pemeliharaan.cetak') }}', window.location.origin);
            url.searchParams.append('kode_barang', kodeBarang);
            url.searchParams.append('bulan', bulan);
            url.searchParams.append('tahun', tahun);

            // Buka di tab baru
            window.open(url.toString(), '_blank');
        }
    </script>
</body>

</html>
