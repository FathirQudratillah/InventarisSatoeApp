<x-form action="{{ route('data-ruang.store') }}">
    <x-slot:title>
        Data Ruang
    </x-slot:title>
    <x-input name="id_ruang" />
    <x-input name="nama_ruang" />
    <x-select name="jenis_ruang">
        <option value="Ruang Kelas">Ruang Kelas</option>
        <option value="Ruang Praktek">Ruang Praktek</option>
    </x-select>
    <x-input name="kapasitas" />
    <x-select name="lokasi">
        <option value="Gedung A">Gedung A</option>
        <option value="Gedung B">Gedung B</option>
        <option value="Gedung C">Gedung C</option>
        <option value="Gedung D">Gedung D</option>
        <option value="Gedung E">Gedung E</option>
        <option value="Gedung F">Gedung F</option>
    </x-select>
    
    <x-slot:button> <x-back-button href="{{ route('data-ruang.index') }}"></x-back-button></x-slot:button>
        
</x-form>