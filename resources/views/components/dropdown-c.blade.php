<div class="relative inline-block text-left">
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

    <!-- Dropdown Tambah Data -->
    <div class="dropdown-menu hidden absolute right-0 z-50 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-xl">
        <div class="px-4 py-2 border-b border-gray-100">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Menu</p>
        </div>
        <ul class="py-1 text-sm">
            <li>
                <a href="{{ route($route . '.create') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    <span class="flex items-center justify-center w-7 h-7 rounded-md bg-indigo-100 text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </span>
                    <div>
                        <p class="font-medium text-sm">Tambah Data</p>
                        <p class="text-xs text-gray-400">Tambah ruang baru</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>