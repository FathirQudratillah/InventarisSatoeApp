<x-form action="{{ route('data-barang.store')}}">
    <x-slot:title>
        Data Barang
    </x-slot:title>
    <x-input name="kode_barang" />
    <x-input name="id_ruang" />
    <x-input name="jenis_barang" />
    <x-input name="kondisi_barang" />
    <x-input name="tahun_perolehan" />
    <x-input name="keterangan" />
    <x-slot:button> <x-back-button href="{{ route('data-barang.index') }}"></x-back-button></x-slot:button>
</x-form>