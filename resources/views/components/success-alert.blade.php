@if (session('success'))
    <div class="bg-green-200 border-green-100 text-green-700 p-4 my-2 rounded">
        {{ $slot }}
    </div>
@endif