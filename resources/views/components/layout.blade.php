<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <title>{{ $title }}</title>
</head>
<body>
    <div class="flex h-screen overflow-hidden">
    <x-navbar></x-navbar>

    <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100 overflow-y-auto"
                style="scrollbar-width:none; -ms-overflow-style:none;"
        >
            <x-header>{{ $title }}</x-header>
            {{ $slot }}
        </main>
    
    </div>

    
    
</body>
</html>