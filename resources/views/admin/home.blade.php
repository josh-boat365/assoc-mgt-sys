<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-5 md:container md:mx-auto">
        <div class="text-center">
            <span class=" text-[1.6rem] font-bold text-gray-800 " id="greetings"></span>
            @empty(Auth::user()->firstname && Auth::user()->surname)
            <span class="text-[1.6rem]">{{Auth::user()->username}}</span>
            @else
            <span class="text-[1.6rem]">{{Auth::user()->firstname}} {{Auth::user()->surname}}</span>
            @endempty



        </div>



        <div class="py-12">
            <div class="max-w-7xl md:mx-auto sm:px-6 lg:px-8 bg-white shadow p-4">
                 <livewire:user-table/>
            </div>
        </div>





    </div>
</x-app-layout>
