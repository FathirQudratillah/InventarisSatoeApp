
<x-form action="{{ route('data-barang.update', $barang->kode_barang) }}">
    @method('PUT')
    <x-slot:title>
        Data Barang
    </x-slot:title>
    <x-select :datas="$id_ruang" :value="$barang->id_ruang" name="id_ruang"></x-select>
    <x-select :datas="$jenis_barang" :value="$barang->jenis_barang" name="jenis_barang"></x-select>
    <x-input name="nama_barang" :value="$barang->nama_barang"/>
    <x-input name="tahun_perolehan" :value="$barang->tahun_perolehan"/>
    <x-input name="keterangan" :value="$barang->keterangan"/>
    <x-slot:button> <x-back-button href="{{ route('data-barang.index') }}"></x-back-button></x-slot:button>
        
</x-form>