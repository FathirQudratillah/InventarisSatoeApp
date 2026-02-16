@props(['name', 'value' => null])

@php
    $label = ucwords(str_replace('_', ' ', $name));
@endphp

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        {{ $label }}
    </label>

    <input type="text"
           name="{{ $name }}"
           value="{{ old($name,$value) }}"
           placeholder="Masukkan {{ $label }}"
           class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                  transition duration-200 outline-none"
           required>

    @error($name)
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>