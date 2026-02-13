<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">
    Password
</label>
<div>
    <div class="relative">
    <input type="password"
            id="password"
            name="password"
            placeholder="Minimal 6 karakter"
            class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                    focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                    transition duration-200 outline-none"
            required>

    <button type="button"
            onclick="togglePassword()"
            class="absolute right-3 top-3 text-gray-500 hover:text-gray-700 text-sm">
        Lihat
    </button>
</div>
</div>
@error('password')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
@enderror
</div>
 <script>
        function togglePassword() {
            const password = document.getElementById('password');
            password.type = password.type === 'password' ? 'text' : 'password';
        }
    </script>