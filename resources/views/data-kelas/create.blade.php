<x-form action="{{ route('data-kelas.store')}}">
    <x-slot:title>
        Data Kelas
    </x-slot:title>
    <x-select :datas="$id_jurusan" name="id_jurusan"></x-select>
    <x-select :datas="$angkatan" name="angkatan"></x-select>
    <x-select name="kelas">
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="Alumni">Alumni</option>
    </x-select>
    <x-select name="subkelas">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="-">Alumni</option>
    </x-select>

    <x-slot:button> <x-back-button href="{{ route('data-kelas.index') }}"></x-back-button></x-slot:button>
</x-form>