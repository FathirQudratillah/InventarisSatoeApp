 <!-- Sidebar -->
 <aside id="sidebar"
     class="fixed inset-y-0 left-0 z-40 w-60 md:w-80 bg-gray-900 text-white
                transform -translate-x-full transition-transform duration-300
                lg:relative lg:translate-x-0 flex flex-col
                h-screen overflow-y-auto"
     style="scrollbar-width:none; -ms-overflow-style:none;">


     <div class="p-4 border-b border-gray-800">
         <div class="flex items-center justify-between">
             <img src="{{ asset('images/logo_notext.png') }}" alt="Logo" class="h-10 w-auto">
             <span class="text-l md:text-xl font-bold">InventarisSatoeApp</span>
         </div>
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


     <nav class="mt-5 px-2 flex-1 overflow-y-auto pb-28">
         <!-- Main Navigation -->
         <div class="space-y-4">
             <!-- Dashboard -->
             <x-side-link href="/" :active="request()->is('/')">
                 <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                 </svg>
                 Dashboard
             </x-side-link>

             @unless (auth()->user()->role != 'admin')
                 <!-- Analytics Dropdown -->
                 <div class="space-y-1">
                     <button
                         class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none"
                         aria-expanded="false" aria-controls="analytics-dropdown">
                         <div class="flex items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5 mr-3">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                             </svg>

                             Data Master
                         </div>
                         <svg class="ml-2 h-5 w-5 transform transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                             <path fill-rule="evenodd"
                                 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                 clip-rule="evenodd" />
                         </svg>
                     </button>
                     <div class="{{ request()->is('data-*') ? '' : 'hidden' }} space-y-1 pl-11" id="analytics-dropdown">
                         <x-side-link href="{{ route('data-akun.index') }}" :active="request()->is('data-akun')">Data Akun</x-side-link>

                         <x-side-link href="{{ route('data-kelas.index') }}" :active="request()->is('data-kelas')">Data Kelas</x-side-link>
                         <x-side-link href="{{ route('data-jurusan.index') }}" :active="request()->is('data-jurusan')">DataJurusan</x-side-link>
                         <x-side-link href="{{ route('data-ruang.index') }}" :active="request()->is('data-ruang')">Data Ruang</x-side-link>
                         <x-side-link href="{{ route('data-angkatan.index') }}" :active="request()->is('data-angkatan')">DataAngkatan</x-side-link>

                         <x-side-link href="{{ route('data-barang.index') }}" :active="request()->is('data-barang')">DataBarang</x-side-link>
                         <x-side-link href="{{ route('data-jenis-barang.index') }}" :active="request()->is('data-jenis-barang')">Data
                             JenisBarang</x-side-link>
                         <x-side-link href="{{ route('data-kategori-barang.index') }}" :active="request()->is('data-kategori-barang')">Data
                             KategoriBarang</x-side-link>
                         <x-side-link href="{{ route('data-penanggung-jawab.index') }}" :active="request()->is('data-penanggung-jawab')">DataPenanggung
                             Jawab</x-side-link>

                     </div>
                 </div>

                 <!-- Team Dropdown -->
                 <div class="space-y-1">
                     <button
                         class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none"
                         aria-expanded="false" aria-controls="team-dropdown">
                         <div class="flex items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5 mr-3">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                             </svg>

                             Data Transaksi
                         </div>
                         <svg class="ml-2 h-5 w-5 transform transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                             <path fill-rule="evenodd"
                                 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                 clip-rule="evenodd" />
                         </svg>
                     </button>
                     <div class="{{ request()->routeIs('detail-peminjaman.*') ||
                     request()->routeIs('pemeliharaan-barang.*') ||
                     request()->routeIs('pengajuan-barang.*') ||
                     request()->routeIs('peminjaman-barang.*')
                         ? ''
                         : 'hidden' }} space-y-1 pl-11"
                         id="team-dropdown">

                         <x-side-link href="{{ route('detail-peminjaman.index') }}" :active="request()->is('detail-peminjaman')"> Detail
                             Peminjaman</x-side-link>
                         <x-side-link href="{{ route('pemeliharaan-barang.index') }}" :active="request()->is('pemeliharaan-barang')"> Pemeliharaan
                             Barang</x-side-link>
                         <x-side-link href="{{ route('pengajuan-barang.index') }}" :active="request()->is('pengajuan-barang')"> Pengajuan
                             Barang</x-side-link>
                         <x-side-link href="{{ route('peminjaman-barang.index') }}" :active="request()->is('peminjaman-barang')"> Peminjaman
                             Barang</x-side-link>


                     </div>
                 </div>
             @endunless


             <!-- Data Transaksi -->
             <a href="{{ route('pemeliharaan-barang.create') }}"
                 class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                 <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                 </svg>
                 Pemeliharaan Barang
             </a>

             <a href="{{ route('pengajuan-barang.create') }}"
                 class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                 <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                 </svg>
                 Pengajuan Barang
             </a>

             <a href="{{ route('peminjaman-barang.create') }}"
                 class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                 <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                 </svg>
                 Peminjaman Barang

                 <a href="{{ route('laporan.index') }}"
                     class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                     <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                     </svg>
                     Lihat Laporan
                 </a>

                 <a href="{{ route('peminjaman-barang.create') }}"
                     class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                     <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                     </svg>
                     Peminjaman Barang
                 </a>
             </div>
         </nav>
            

     <!-- User Profile -->
     <div x-data="{ open: false }" class="mt-auto p-4 border-t border-gray-800 relative">
         <div @click="open = !open" class="flex items-center cursor-pointer">
             <button class="w-8 h-8 rounded-full overflow-hidden">
                 <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                     alt="User" class="w-full h-full object-cover">
             </button>
             <div class="ml-3">
                 <p class="text-sm font-medium text-white">
                     {{ auth()->user()->username }}
                 </p>
                 <p class="text-xs text-gray-400">{{ auth()->user()->user_id }}</p>
             </div>
         </div>

         <!-- Dropdown -->
         <div x-show="open" @click.outside="open = false" x-transition
             class="absolute bottom-full mb-2 w-50 bg-gray-600 rounded-md shadow-lg overflow-hidden">
             <a href="/detail" class="flex items-center px-4 py-2 text-sm text-blue-400 hover:bg-gray-800">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6 mr-3">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                 </svg>

                 Detail
             </a>

             <form method="POST" action="/logout">
                 @csrf
                 <button type="submit"
                     class="w-full flex items-center text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-800">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6 mr-3">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                     </svg>

                     Logout
                 </button>
             </form>
         </div>
     </div>

 </aside>

 <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden">
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
 <aside class="lg:hidden w-12 md:w-20 bg-gray-900 border-r border-gray-200">
     <div class="h-full flex flex-col items-center py-4">
         <!-- Logo -->
         <div class="p-2">
             <img src="{{ asset('images/logo_notext.png') }}" alt="Logo" class="h-8 w-8">
         </div>

         <!-- Navigation -->
         <nav class="flex-1 w-full px-2 space-y-2 mt-6">


             <button onclick="toggleSidebar()"
                 class=" w-full p-2 flex justify-center rounded-lg {{ request()->is('/') ? 'bg-indigo-50 text-indigo-600' : ' text-gray-500 hover:bg-gray-50' }}">
                 <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                 </svg>
             </button>

             @unless (auth()->user()->role != 'admin')
                 <button onclick="toggleSidebar()"
                     class="w-full p-2 flex justify-center rounded-lg {{ request()->is('data-*') ? 'bg-indigo-50 text-indigo-600' : ' text-gray-500 hover:bg-gray-50' }}">
                     <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                     </svg>
                 </button>


                 <button onclick="toggleSidebar()"
                     class="w-full p-2 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50 {{ request()->routeIs('detail-peminjaman.*') ||
                     request()->routeIs('pemeliharaan-barang.*') ||
                     request()->routeIs('pengajuan-barang.*') ||
                     request()->routeIs('peminjaman-barang.*')
                         ? 'bg-indigo-50 text-indigo-600'
                         : ' text-gray-500 hover:bg-gray-50' }}">
                     <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                     </svg>
                 </button>
             @endunless

             {{-- <button onclick="toggleSidebar()"
                 class="w-full p-2 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                 <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                 </svg>
             </button>

             <button class="w-full p-2 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                 <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                 </svg>
             </button>

             <button class="w-full p-2 flex justify-center rounded-lg text-gray-500 hover:bg-gray-50">
                 <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                 </svg>
             </button> --}}
         </nav>

         <!-- User Profile -->
         <div x-data="{ open: false }" class="mt-auto p-4 border-t border-gray-800 relative">
             <div @click="open = !open" class="flex items-center cursor-pointer">
                 <button class="w-8 h-8 rounded-full overflow-hidden">
                     <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="User" class="w-full h-full object-cover">
                 </button>

             </div>

             <!-- Dropdown -->
             <div x-show="open" @click.outside="open = false" x-transition
                 class="absolute bottom-full mb-2 w-50 bg-gray-800 rounded-md shadow-lg overflow-hidden">
                 <a href="/detail" class="flex items-center px-4 py-2 text-sm text-blue-400 hover:bg-gray-800">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6 mr-3">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                     </svg>

                     Detail
                 </a>

                 <form method="POST" action="/logout">
                     @csrf
                     <button type="submit"
                         class="w-full flex items-center text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-800">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                         </svg>

                         Logout
                     </button>
                 </form>
             </div>
         </div>
 </aside>
