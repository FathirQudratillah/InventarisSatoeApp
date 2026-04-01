<x-form type="Edit" action="{{ route('data-akun.update', $akun->user_id) }}">
    @method('PUT')
    <x-slot:title>
        Data {{$akun->$role->nama}}
    </x-slot:title>
    <x-input name="nama" :value="$akun->$role->nama"/>
    <x-select name="jenis_kelamin">
        <option value="Laki-laki" {{ $akun->$role->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} >Laki-laki</option>
        <option value="Perempuan" {{ $akun->$role->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </x-select>    
    <x-input name="alamat" :value="$akun->$role->alamat"/>
    <x-slot:button> <x-back-button href="{{ route('detail')  }}"></x-back-button></x-slot:button>
        
</x-form>