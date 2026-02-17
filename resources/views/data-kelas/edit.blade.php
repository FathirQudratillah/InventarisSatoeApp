<x-form type="Edit" action="{{ route('data-kelas.update', $kelas->id_kelas) }}">
    @method('PUT')
    <x-slot:title>
        Data Kelas
    </x-slot:title>
    
    <x-select :datas="$id_jurusan" :value="$kelas->id_jurusan" name="id_jurusan"></x-select>
    <x-select :datas="$angkatan" :value="$kelas->angkatan" name="angkatan"></x-select>
    <x-select name="kelas">
        <option value="10" {{ $kelas->kelas == '10' ? 'selected' : '' }} >10</option>
        <option value="11" {{ $kelas->kelas == '11' ? 'selected' : '' }}>11</option>
        <option value="12" {{ $kelas->kelas == '12' ? 'selected' : '' }}>12</option>
        <option value="Alumni" {{ $kelas->kelas == 'Alumni' ? 'selected' : '' }}>Alumni</option>
    </x-select>
    <x-select name="subkelas">
        <option value="A" {{ $kelas->subkelas == 'A' ? 'selected' : '' }}>A</option>
        <option value="B" {{ $kelas->subkelas == 'B' ? 'selected' : '' }}>B</option>
        <option value="-" {{ $kelas->subkelas == '-' ? 'selected' : '' }}>Alumni</option>
    </x-select>
    <x-slot:button> <x-back-button href="{{ route('data-kelas.index') }}"></x-back-button></x-slot:button>
        
</x-form>