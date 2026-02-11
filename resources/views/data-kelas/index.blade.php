<x-layout>
    <x-slot:title>Data Kelas</x-slot:title>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Data Kelas</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Jurusan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Angkatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subkelas</th>
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
