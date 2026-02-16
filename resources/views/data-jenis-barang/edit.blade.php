<x-form action="{{ route('data-jenis-barang.update', $jenis_barang->jenis_barang) }}">
    @method('PUT')
    <x-slot:title>
        Data Jenis Barang
    </x-slot:title>
    <x-input name="jenis_barang" :value="$jenis_barang->jenis_barang"/>
    <x-select :datas="$kategori" :value="$barang->kategori" name="kategori"></x-select>
    <x-input name="sumber" :value="$jenis_barang->sumber"/>
    <x-input name="spesifikasi" :value="$jenis_barang->spesifikasi"/>
    <x-input name="keterangan" :value="$jenis_barang->keterangan"/>
    <x-slot:button> <x-back-button href="{{ route('data-jenis-barang.index') }}"></x-back-button></x-slot:button>
        
</x-form>