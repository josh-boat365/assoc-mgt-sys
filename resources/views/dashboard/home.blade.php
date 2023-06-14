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


            <p>{{$text}}</p>
        </div>



        <div class="py-12">
            <div class="max-w-5xl md:mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center p-3 gap-5">
                    <x-card href="{{ route('profile.view')}}" class="w-[12rem] text-center border-t-4 rounded border-sky-700">
                        <i class="fa-solid fa-id-badge fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Profile</p>
                    </x-card>
                    <x-card href="#" class="w-[12rem] text-center border-t-4 rounded border-yellow-400">
                        <i class="fa-solid fa-money-bill fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Dues</p>
                    </x-card>
                    <x-card href="#" class="w-[12rem] text-center border-t-4 rounded border-purple-600">
                        <i class="fa-solid fa-chalkboard-user fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Conference</p>
                    </x-card>
                    <x-card href="#" class="w-[12rem] text-center border-t-4 rounded border-teal-600">
                        <i class="fa-solid fa-shop fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Shop</p>
                    </x-card>
                    <x-card href="#" class="w-[12rem] text-center border-t-4 rounded border-rose-700">
                        <i class="fa-solid fa-book-open-reader fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Resources</p>
                    </x-card>
                    <x-card href="#" class="w-[12rem] text-center border-t-4 rounded  border-lime-700">
                        <i class="fa-solid fa-comments fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Chats</p>
                    </x-card>
                    <x-card href="{{route('profile.edit')}}" class="w-[12rem] text-center border-t-4 rounded border-teal-600">
                        <i class="fa-solid fa-gear fa-2xxl"></i>
                        <p class="text-[1.5rem] font-semi-bold">Settings</p>
                    </x-card>
                </div>
            </div>
        </div>





    </div>
</x-app-layout>
