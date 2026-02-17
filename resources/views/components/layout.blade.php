@props(['type'=>null,'title'])

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
        @if ($type=='login')
            
        @elseif ($type=='signup')

        @else
        <x-navbar></x-navbar>
        @endif

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