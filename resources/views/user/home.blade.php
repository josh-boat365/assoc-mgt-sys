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


            <p>Kindly take note! You would have to pay your monthly <a href="{{ route('dues.view') }}" class="hover:text-red-600 hover:underline" @style(['color: red !important'])>dues</a>  to be able to have full <a href="{{ route('profile.view') }}" class="hover:text-red-600 hover:underline" @style(['color: red !important'])>access</a> to this application.</p>
        </div>

        <div class="mt-3 max-w-3xl m-auto">

            <x-auth-session-status class="mb-5" :status="session('status')" />
            <x-success-message class="mb-5" :success="session('success')" />
            <x-error-message class="mb-5" :fail="session('fail')" />

        </div>



        <div class="py-12">
            <div class="max-w-5xl md:mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center p-3 gap-5">

                    <x-card href="{{ route('profile.view')}}" class="w-[12rem] text-center border-t-4 rounded border-sky-700">
                        <i class="fa-solid fa-id-badge fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on profile tab to view your profile information.
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Profile</p>
                    </x-card>

                    <x-card href="{{route('dues.view')}}" class="w-[12rem] text-center border-t-4 rounded border-yellow-400">
                        <i class="fa-solid fa-money-bill fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on dues tab to pay your monthly dues. <span class="text-[0.7rem]" style="color: orange !important;">Payment ensures full access to this platform.</span>
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Dues</p>
                    </x-card>

                    <x-card href="{{route('conference.view')}}" class="w-[12rem] text-center border-t-4 rounded border-purple-600">
                        <i class="fa-solid fa-chalkboard-user fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on conference tab to view and pay for upcoming conferences.
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Conference</p>
                    </x-card>

                    <x-card href="{{route('shop.view')}}" class="w-[12rem] text-center border-t-4 rounded border-teal-600">
                        <i class="fa-solid fa-shop fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on shop tab to purchase association related items.
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Shop</p>
                    </x-card>

                    <x-card href="{{route('resources.view')}}" class="w-[12rem] text-center border-t-4 rounded border-rose-700">
                        <i class="fa-solid fa-book-open-reader fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on resources tab to access to conference related files and association related files.
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Resources</p>
                    </x-card>

                    <x-card href="{{route('chats.view')}}" class="w-[12rem] text-center border-t-4 rounded  border-lime-700">
                        <i class="fa-solid fa-comments fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on chats tab to message colleagues via email in your region.
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Chats</p>
                    </x-card>

                    <x-card href="{{route('profile.edit')}}" class="w-[12rem] text-center border-t-4 rounded border-teal-600">
                        <i class="fa-solid fa-gear fa-2xxl"></i>
                        <p class="text-[0.8rem]">
                            Click on settings tab to update profile and password.
                        </p>
                        <p class="text-[1.5rem] font-semi-bold">Settings</p>
                    </x-card>
                </div>
            </div>
        </div>





    </div>
</x-app-layout>
