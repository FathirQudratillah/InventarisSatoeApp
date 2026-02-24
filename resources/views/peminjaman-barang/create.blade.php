<x-form action="{{ route(auth()->user()->role . '.peminjaman-barang.store') }}">
    <x-slot:title>
        Peminjaman Barang
    </x-slot:title>

    <div class="col-span-2" id="barang-wrapper">
       
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Kode Barang
            </label>

            <div class="relative">
                <input type="text" name="kode_barang[]" value="{{ old('kode_barang[]') }}"
                    placeholder="Masukkan Kode Barang"
                    class="w-full px-4 py-3 pr-12 border rounded-xl
            focus:ring-2 transition duration-200 outline-none
            {{ $errors->has('kode_barang[]') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500' }}">

                <button id="tambahBarang" type="button"
                    class="absolute right-2 top-1/2 -translate-y-1/2
            bg-indigo-500 hover:bg-indigo-600
            text-white w-8 h-8 rounded-lg">
                    +
                </button>
            </div>

            @error('kode_barang[]')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        
    </div>



        <x-input name="tanggal_peminjaman" type="date" :value="date('Y-m-d')" />
        <x-input name="tanggal_pengembalian" type="date" :value="date('Y-m-d')" />

        <x-slot:button>
            <x-back-button href="{{ route('data-barang.index') }}"></x-back-button>
        </x-slot:button>
</x-form>

<script>
    let index = 1;

    document.getElementById('tambahBarang').onclick = function() {

        let html = `
        
            

            <div class="mt-2 relative">
                <input type="text" name="kode_barang[]" value="{{ old('kode_barang[]') }}"
                    placeholder="Masukkan Kode Barang"
                    class="w-full px-4 py-3 pr-12 border rounded-xl
            focus:ring-2 transition duration-200 outline-none
            {{ $errors->has('kode_barang[]') ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500' }}">

                <button type="button"
                    class=" hapus absolute right-2 top-1/2 -translate-y-1/2
            bg-red-500 hover:bg-red-600
            text-white w-8 h-8 rounded-lg">
                    -
                </button>
            </div>

            @error('kode_barang[]')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        
    `;

        document.getElementById('barang-wrapper')
            .insertAdjacentHTML('beforeend', html);
    };

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hapus')) {
            e.target.parentElement.remove();
        }
    });
</script>
