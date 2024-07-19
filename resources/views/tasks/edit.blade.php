<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a task') }}
        </h2>
    </x-slot>

    <x-tasks-card>

        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="post">
            @csrf
            @method('put')

            <!-- Titre -->
            <div>
                <x-input-label for="title" :value="__('Title')" />

                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus />
            
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Détail -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Descrption')" />

                <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('detail', $task->description) }}</x-textarea>
                
                <x-input-error :messages="$errors->get('description')" class="mt-2" />            
            </div>

            <!-- Tâche accomplie -->
            <div class="block mt-4">
                <label for="completed" class="inline-flex items-center">
                    <input id="completed" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="completed" @if(old('completed', $task->completed)) checked @endif>
                    <span class="ms-2 text-sm text-gray-600">{{ __('Task done') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>

    </x-tasks-card>
</x-app-layout>