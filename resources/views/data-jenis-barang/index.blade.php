<x-layout>
    <x-slot:title>Data Jenis Barang</x-slot:title>
            <div class="mt-4 p-6 bg-white rounded-lg shadow-md">
                <p class="text-gray-600">Data Jenis Barang</p>
            </div>
            <div class="p-6">

            <h1 class="text-2xl font-bold mb-4">Data Jenis Barang</h1>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Id Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun Perolehan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sumber</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Spesifikasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($jenisBarangs as $jenis_barang)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $jenis_barang->id_kategori }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $jenis_barang->nama_barang }}
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $jenis_barang->tahun_perolehan }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $jenis_barang->sumber }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $jenis_barang->spesifikasi }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $jenis_barang->keterangan }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Data Jenis Barang belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
</x-layout>