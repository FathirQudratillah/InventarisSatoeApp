<x-layout>
    <x-slot:title>Data Kelas</x-slot:title>
    <div class="mt-4 p-3 md:p-6 bg-white rounded-lg shadow-md flex justify-between items-center">
            <p class="text-gray-600">Data Kelas</p>
            <button class="px-2 py-1 md:px-4 md:py-2 bg-indigo-600 text-white rounded-lg  
                    hover:bg-indigo-700 transition duration-200">
                    <a href="{{ route('data-kelas.create') }}">Tambah Data</a>
                </button>
        </div>

    <div class="md:p-6">

        <h1 class="text-2xl font-bold mb-4">Data Kelas</h1>

        <div class="bg-white shadow rounded-lg overflow-auto">
            <table class="min-w-full divide-y divide-gray-200">
                
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Kelas</th>
                        <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Jurusan</th>
                        <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Angkatan</th>
                        <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                        <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Subkelas</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($akun as $kelas)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $kelas->id_kelas }}</td>
                            <td class="px-6 py-4 text-sm">{{ $kelas->id_jurusan }}</td>
                            <td class="px-6 py-4 text-sm">{{ $kelas->angkatan }}</td>
                            <td class="px-6 py-4 text-sm">{{ $kelas->kelas }}</td>
                            <td class="px-6 py-4 text-sm">{{ $kelas->subkelas }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Data kelas belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</x-layout>
