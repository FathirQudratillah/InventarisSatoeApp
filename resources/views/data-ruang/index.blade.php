<x-layout>
    <x-slot:title>Data Ruang</x-slot:title>
            <div class="mt-4 p-6 bg-white rounded-lg shadow-md">
                <p class="text-gray-600">Data Ruang</p>
            </div>
    <div class="p-6">

            <h1 class="text-2xl font-bold mb-4">Data Ruang</h1>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Id Ruang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Ruang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Ruang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kapasitas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($ruangs as $ruang)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $ruang->id_ruang }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $ruang->nama_ruang }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $ruang->jenis_ruang }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $ruang->kapasitas }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $ruang->lokasi }}
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Data Ruang belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
</x-layout>