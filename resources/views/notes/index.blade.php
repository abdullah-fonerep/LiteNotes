<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notes.index') ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-alert>{{ session('success') }}</x-success-alert>
            @if (request()->routeIs('notes.index'))
                <a href="{{ route('notes.create') }}" 
                    class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >+ new note</a>
            @endif
            @forelse ($notes as $note)
                <div class="bg-white my-6 p-6 rounded">
                    <h2 class="text-2xl my-4 font-bold">
                        <a 
                        @if (!$note->trashed())
                        href="{{ route('notes.show', $note) }}"
                        @else
                        href="{{ route('trashed.show', $note) }}"
                        @endif
                        >{{ $note->title }}</a>
                    </h2>
                    <p class="mb-4">{{ Str::limit($note->text, 200) }}</p>
                    <span class="opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>
            @empty
            @if (request()->routeIs('notes.index'))    
                <p class="bg-white font-bold p-6 my-6 text-xl text-center rounded">
                    No Notes added yet..!
                </p>
            @else
                <p class="bg-white font-bold p-6 my-6 text-xl text-center rounded">
                    Nothing in Trash
                </p>
            @endif
            @endforelse
        </div>
    </div>
</x-app-layout>
