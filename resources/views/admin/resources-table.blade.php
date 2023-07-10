<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Resource   Links: ') }}
            </h2>
            <div class="flex justify-between">
                <x-primary-button>Resource Table</x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl md:mx-auto sm:px-6 lg:px-8 bg-white shadow p-4">
            <livewire:resources />
        </div>
    </div>

</x-app-layout>
