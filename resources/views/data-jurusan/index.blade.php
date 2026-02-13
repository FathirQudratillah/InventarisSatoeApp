<x-layout>
    <x-slot:title>Data Jurusan</x-slot:title>
            <div class="mt-4 p-3 md:p-6 bg-white rounded-lg shadow-md flex justify-between items-center">
                <p class="text-gray-600">Data Jurusan</p>
                <button class="px-2 py-1 md:px-4 md:py-2 bg-indigo-600 text-white rounded-lg  
                    hover:bg-indigo-700 transition duration-200">
                    <a href="{{ route('data-akun.create') }}">Tambah Data</a>
                </button>
            </div>
      <div class="md:p-6">

            <h1 class="text-2xl font-bold mb-4">Data Jurusan </h1>

            <div class="bg-white shadow rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Id_jurusan</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Jurusan</th>
                            
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($jurusans as $jurusan)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $jurusan->id_jurusan }}
                                </td>
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $jurusan->jurusan }}
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Data Jurusan belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
        
</x-layout>

