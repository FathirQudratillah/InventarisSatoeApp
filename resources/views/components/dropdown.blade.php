<div class="relative inline-block text-left">

    <!-- Tombol Titik Tiga -->
    <button
        type="button"
        onclick="toggleDropdown(this)"
        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-600 transition duration-200 focus:outline-none"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="5" r="2"/>
            <circle cx="12" cy="12" r="2"/>
            <circle cx="12" cy="19" r="2"/>
        </svg>
    </button>

    <!-- Dropdown Pop Up -->
    <div class="dropdown-menu hidden absolute right-0 z-50 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-xl">

        <div class="px-4 py-2 border-b border-gray-100">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Pilih Aksi</p>
        </div>

        <ul class="py-1 text-sm">

            <!-- Edit -->
            <li>
                <a href="{{ route($route . '.edit', $id) }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <span class="flex items-center justify-center w-7 h-7 rounded-md bg-blue-100 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </span>
                    <div>
                        <p class="font-medium text-sm">Edit</p>
                        <p class="text-xs text-gray-400">Ubah data jenis barang</p>
                    </div>
                </a>
            </li>

            <li class="border-t border-gray-100 mx-2"></li>

            <!-- Delete -->
            <li>
                <form action="{{ route($route . '.destroy', $id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-3 w-full px-4 py-2.5 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                        <span class="flex items-center justify-center w-7 h-7 rounded-md bg-red-100 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16"/>
                            </svg>
                        </span>
                        <div class="text-left">
                            <p class="font-medium text-sm">Delete</p>
                            <p class="text-xs text-gray-400">Hapus data jenis barang</p>
                        </div>
                    </button>
                </form>
            </li>

        </ul>
    </div>

</div>