<x-form action="{{ route('data-akun.store') }}">
    <x-slot:title>
        Data akun
    </x-slot:title>
    <x-input name="user_id" />
    <x-input name="username" />
    <x-input-password></x-input-password>
    <x-slot:button> <x-back-button href="{{ route('data-akun.index') }}"></x-back-button></x-slot:button>
        
</x-form>