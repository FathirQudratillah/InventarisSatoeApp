<x-layout>
    <x-slot:title>Data Barang</x-slot:title>
        <div class="mt-4 p-3 md:p-6 bg-white rounded-lg shadow-md flex justify-between items-center">
            <p class="text-gray-600">Data Barang</p>
            
            <!-- Tombol Tambah Data dengan Titik Tiga -->
            <x-dropdown-c route="data-barang"></x-dropdown-c>
        </div>

        <div class="md:p-6">
            <h1 class="text-2xl font-bold mb-4">Data Barang</h1>

            <div class="bg-white shadow rounded-lg overflow-visible">
                <table class="min-w-full divide-y divide-gray-200 " >
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Barang</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Id Ruang</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Barang</th>
                            
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun Perolehan</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Kondisi Barang</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($barangs as $barang)
                            <tr class="hover:bg-gray-50">

                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $barang->kode_barang }}
                                </td>
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $barang->id_ruang }}
                                </td>
                                
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $barang->jenis_barang }}
                                </td>
                                
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $barang->tahun_perolehan }}
                                </td>
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $barang->kondisi_barang }}
                                </td>
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $barang->keterangan }}

                                

                                <!-- Kolom Aksi -->
                                <td class="px-4 py-2 md:px-6 md:py-3 text-sm text-gray-700">
                                    <x-dropdown route="data-barang" :id="$barang->kode_barang"></x-dropdown>  

                                </td>
                            
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Data Barang belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    <!-- JavaScript Vanilla -->
    

</x-layout>