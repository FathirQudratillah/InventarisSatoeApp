<x-layout>
    <x-slot:title>Data Admin</x-slot:title>
            <div class="mt-4 p-6 bg-white rounded-lg shadow-md">
                <p class="text-gray-600">Data Admin</p>
            </div>
            <div class="p-6">

            <h1 class="text-2xl font-bold mb-4">Data Admin</h1>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Header -->
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIP</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Kontak</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($admins as $admin)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $admin->nip }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $admin->user_id }}
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $admin->nama }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $admin->email }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $admin->no_kontak }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $admin->alamat }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Data Admin belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
</x-layout>