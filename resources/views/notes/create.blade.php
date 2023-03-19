<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white my-6 p-6 rounded">
                <form action="{{ route('notes.store') }}" method="post">
                    @csrf
                    <x-text-input type="text" name='title' field="title" class="w-full" placeholder="Title" :value="@old('title')"></x-text-input>
                    
                    <x-textarea name="text" class="w-full mt-5" placeholder="start typing here...." field="text" id="text" rows="6" :value="@old('text')"></x-textarea>
                    <x-primary-button class="mt-5">Add Note</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
