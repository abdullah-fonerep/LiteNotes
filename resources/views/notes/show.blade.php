<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white my-6 p-6 rounded">
                <x-success-alert>{{ session('success') }}</x-success-alert>
                <div class="flex">
                    @if ($note->trashed())
                        <p class="opacity-70">
                            <strong>Deleted:</strong> {{ $note->deleted_at->diffForHumans() }}
                        </p>
                        <form action="{{ route('trashed.update', $note) }}" class="ml-auto" method="post">
                            @csrf
                            @method('put')
                            <x-primary-button onclick="return confirm('Are you sure you want to restore that note?')">restore note</x-primary-button>
                        </form>
                        <form action="{{ route('trashed.delete', $note) }}" class="ml-2" method="post">
                            @csrf
                            @method('delete')
                            <x-danger-button onclick="return confirm('Do you really want to delete that note permanently? This action will not be undone.')">delete note permanently</x-danger-button>
                        </form>
                    @else
                        <p class="opacity-70">
                            <strong>Updated:</strong> {{ $note->updated_at->diffForHumans() }}
                        </p>
                        <p class="opacity-70 ml-2">
                            <strong>Create:</strong> {{ $note->created_at->diffForHumans() }}
                        </p>
                        <a href="{{ route('notes.edit', $note) }}" class="ml-auto inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >Edit Note</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="post">
                            @csrf
                            @method('delete')
                            <x-danger-button class="ml-2" onclick="return confirm('Are you sure you want to move it in trash?')">move to trash</x-danger-button>
                        </form>
                    @endif
                </div>
                <h2 class="text-4xl my-4 font-bold">
                    {{ $note->title }}
                </h2>
                <p class="mb-4 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
