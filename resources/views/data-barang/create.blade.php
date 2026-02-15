<x-form action="{{ route('data-barang.store')}}">
    <x-slot:title>
        Data Barang
    </x-slot:title>
    <x-select :datas="$datas" name="jenis_barang"></x-select>
    <x-select :datas="$datas" name="id_ruang"></x-select>
    <x-select name="kondisi_barang">
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Perbaikan">Perbaikan</option>
    </x-select>
    
    <x-input name="tahun_perolehan" />
    <x-input name="keterangan" />
    <x-slot:button> <x-back-button href="{{ route('data-barang.index') }}"></x-back-button></x-slot:button>
</x-form>