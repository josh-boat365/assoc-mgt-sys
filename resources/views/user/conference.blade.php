<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conference') }}
        </h2>
    </x-slot>

    <div class="w-[6rem] ml-[10rem] mt-5  text-center p-2 shadow rounded">
        <a href="{{route('admin.home')}}">
            <span><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 "></i>&nbsp;<span>Back</span></span>
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mt-2 text-[2rem] text-center">Conference Registration</h2>
                    <h3 class="mb-4 text-center text-[0.8rem]">Note that you have to pay your dues in order to Register for Conference.
                        Click on Event Title to read details about the event</h3>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class=" py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Details
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <!-- Price -->
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <!-- <span class="sr-only">Edit</span> -->
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                    <th scope="row" class=" py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        2
                                    </th>
                                    <td class="px-6 py-4">
                                        January 2022 Conference
                                    </td>
                                    <td class="px-6 py-4">
                                        registered
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                                        <a href="{{route('conference.receipt')}}">
                                            <x-primary-button class="ml-4"> {{ __('View receipt') }} </x-primary-button>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                    <th scope="row" class=" py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        1
                                    </th>
                                    <td class="px-6 py-4">
                                        August 2023 Conference
                                    </td>
                                    <td class="px-6 py-4">
                                        not-registered
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                                        <a href="{{ route('conference.registration.view') }}">
                                            <x-green-button class="ml-4"> {{ __('Register Conference') }} </x-green-button>
                                        </a>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
