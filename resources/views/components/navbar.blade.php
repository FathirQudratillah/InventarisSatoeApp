
    
        <!-- Sidebar -->
        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-40 w-80 bg-gray-900 text-white
                transform -translate-x-full transition-transform duration-300
                md:relative md:translate-x-0 md:flex md:flex-col
                h-screen overflow-y-auto"
                style="scrollbar-width:none; -ms-overflow-style:none;"
                >


            <div class="p-4 border-b border-gray-800">
                <div class="flex items-center justify-between">
                    <img src="{{ asset('images/logo_notext.png') }}" alt="Logo" class="h-10 w-auto">
                    <span class="text-xl font-bold">InventarisSatoeApp</span>
                </div>
            

            <!-- Search Bar -->
            {{-- <div class="p-4">
                <div class="relative">
                    <input type="text" class="w-full bg-gray-800 text-white rounded-md pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Search...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div> --}}

            <nav class="mt-5 px-2">
                <!-- Main Navigation -->
                <div class="space-y-4">
                    <!-- Dashboard -->
                    <x-side-link href="/" :active="request()->is('/')">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </x-side-link>

                    <!-- Analytics Dropdown -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none" aria-expanded="true" aria-controls="analytics-dropdown">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Data Master
                            </div>
                            <svg class="ml-2 h-5 w-5 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="space-y-1 pl-11" id="analytics-dropdown">
                            <x-side-link href="{{ route('data-akun.index') }}" :active="request()->is('data-akun')">Data Akun</x-side-link>
                            <x-side-link href="{{ route('data-siswa.index') }}" :active="request()->is('data-siswa')">Data Siswa</x-side-link>
                            <x-side-link href="{{ route('data-kelas.index') }}" :active="request()->is('data-kelas')">Data Kelas</x-side-link>
                            <x-side-link href="{{ route('data-jurusan.index') }}" :active="request()->is('data-jurusan')">Data Jurusan</x-side-link>
                            <x-side-link href="{{ route('data-ruang.index') }}" :active="request()->is('data-ruang')">Data Ruang</x-side-link>
                            <x-side-link href="{{ route('angkatan.index') }}" :active="request()->is('angkatan')">Data Angkatan</x-side-link>
                            <x-side-link href="{{ route('data-guru.index') }}" :active="request()->is('data-guru')">Data Guru</x-side-link>
                            <x-side-link href="{{ route('data-admin.index') }}" :active="request()->is('data-admin')">Data Admin</x-side-link>
                            <x-side-link href="{{ route('data-barang.index') }}" :active="request()->is('data-barang')">Data Barang</x-side-link>
                            <x-side-link href="{{ route('data-jenis-barang.index') }}" :active="request()->is('data-jenis-barang')">Data Jenis Barang</x-side-link>
                            <x-side-link href="{{ route('data-kategori-barang.index') }}" :active="request()->is('data-kategori-barang')">Data Kategori Barang</x-side-link>
                            <x-side-link href="{{ route('data-penanggung-jawab.index') }}" :active="request()->is('data-penanggung-jawab')">Data Penanggung Jawab</x-side-link>
                            
                        </div>
                    </div>

                    <!-- Team Dropdown -->
                    <div class="space-y-1">
                        <button class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none" aria-expanded="false" aria-controls="team-dropdown">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Data Transaksi
                            </div>
                            <svg class="ml-2 h-5 w-5 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="hidden space-y-1 pl-11" id="team-dropdown">
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                                Peminjaman Barang
                            </a>
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                                Detail Peminjaman
                            </a>
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                                Pemeliharaan Barang
                            </a>
                            <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                                Pengajuan Barang
                            </a>
                        </div>
                    </div>

                    <!-- Projects -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Projects
                    </a>

                    <!-- Calendar -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Calendar
                    </a>

                    <!-- Documents -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Documents
                    </a>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="mt-auto p-4 border-t border-gray-800 ">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Tom Cook</p>
                        <p class="text-xs text-gray-400">View profile</p>
                    </div>
                </div>
            </div>
        </aside>

        <div
        id="overlay"
        onclick="toggleSidebar()"
        class="fixed inset-0 bg-black/50 z-30 hidden md:hidden">
        </div>


        {{-- <header class="md:hidden flex items-top  bg-gray-900 px-4 py-3 shadow">
            <button onclick="toggleSidebar()" class="text-white">
                <!-- Hamburger Icon -->
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
        </header> --}}

        <!--Mobile-->
        <aside class="md:hidden w-20 bg-gray-900 border-r border-gray-200">
            <div class="h-full flex flex-col items-center py-4">
                <!-- Logo -->
                <div class="p-2">
                    <img src="{{ asset('images/logo_notext.png') }}" alt="Logo" class="h-8 w-8">
                </div>

                <!-- Navigation -->
                <nav class="flex-1 w-full px-2 space-y-2 mt-6">
                    <button onclick="toggleSidebar()" class="w-full p-3 flex justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </button>

                    <button onclick="toggleSidebar()" class="w-full p-3 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>

                    <button onclick="toggleSidebar()" class="w-full p-3 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                    </button>

                    <button onclick="toggleSidebar()" class="w-full p-3 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </button>

                    <button class="w-full p-3 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </button>

                    <button class="w-full p-3 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </button>
                </nav>

                <!-- User Profile -->
                <div class="mt-auto pb-4">
                    <button class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User" class="w-full h-full object-cover">
                    </button>
                </div>
            </div>
        </aside>


        
    

    
