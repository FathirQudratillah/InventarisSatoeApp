<x-layout>
    <x-slot:title>Pengajuan Barang</x-slot:title>
            <div class="mt-4 p-6 bg-white rounded-lg shadow-md">
                <p class="text-gray-600">Pengajuan Barang</p>
            </div>
            <div class="p-6">

            <h1 class="text-2xl font-bold mb-4">Data Pengajuan Barang</h1>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIP</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Kontak</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($gurus as $guru)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->nip }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->user_id }}
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->nama }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->email }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->jenis_kelamin }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->no_kontak }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $guru->alamat }}
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Data Pengajuan Barang belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
</x-layout>