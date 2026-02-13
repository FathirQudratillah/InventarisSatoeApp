<x-layout>
    <x-slot:title>Data Akun</x-slot:title>
        <div class="mt-4 p-3 md:p-6 bg-white rounded-lg shadow-md flex justify-between items-center">
            <p class="text-gray-600">Data Akun</p>
            <button class="px-2 py-1 md:px-4 md:py-2 bg-indigo-600 text-white rounded-lg 
               hover:bg-indigo-700 transition duration-200">
               <a href="{{ route('data-akun.create') }}">Tambah Data</a>
            </button>
        </div>
        
        {{-- @foreach ($akuns as $akun )
            
        <h3>{{ $akun->user_id }}</h3>
        @endforeach --}}
        <div class="md:p-6">

            <h1 class="text-2xl font-bold mb-4">Data Akun</h1>

            <div class="bg-white shadow rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">User ID</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Username</th>
                            <th class="px-2 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase">Password</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($akuns as $akun)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $akun->user_id }}
                                </td>
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    {{ $akun->username }}
                                </td>
                                <td class="px-4 py-1 md:px-6 md:py-2 text-sm text-gray-700">
                                    ********
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Data akun belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

                


            </div>

        </div>
</x-layout>