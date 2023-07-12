<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conference - Receipt') }}
        </h2>
    </x-slot>

    <div class="w-[6rem] ml-[10rem] mt-5  text-center p-2 shadow rounded">
        <a href="{{route('conference.view')}}">
            <span><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 "></i>&nbsp;<span>Back</span></span>
        </a>
    </div>

    <h2 class=" text-[2rem] text-center">Receipt Details</h2>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- header  -->
                    <div class="flex p-4 res:flex-wrap justify-between items-center">
                        <div>
                            <img class="w-[20rem]" src="{{asset('imgs/ams-logo-full.png')}}" alt="">
                        </div>
                        <div>
                            <p class="font-bold">Receipt</p>
                            <p>23 June, 2023</p>
                            <p># Ams23456</p>
                        </div>
                    </div>

                    <!-- address  -->
                    <div class="flex mt-[3rem] mb-[3rem] p-4 res:flex-wrap justify-between items-center">
                        <div>
                            <p>FROM:</p>
                            <h1 class="font-bold">Association Management System</h1>
                            <p>5th Floor, No. 8 Blohum Street, Dzorwulu.</p>
                            <p>Accra</p>
                        </div>
                        <div>
                            <p>TO:</p>
                            <p class="font-bold">{{Auth::user()->firstname}} {{Auth::user()->surname}}</p>
                            <p># Ams23456</p>
                        </div>
                    </div>

                    <!-- body  -->
                    <!-- table  -->

                    <div class="relative overflow-x-auto border p-4 max-w-2xl m-auto rounded border-gray-200">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Details
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <p class="font-bold">Total</p>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                    <th scope="row" class=" py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        January 2022 Conference
                                    </th>
                                    <td class="px-6 py-4">
                                        Date: 16th January, 2023 <br>
                                        Time: 8:00 <br>
                                        Venue: SB Incubator, Opeibia  - Airpot First
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- paid -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="font-thin">Ghs 1,000.00</p>
                                    </td>

                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                    <th scope="row" class=" py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p class="font-bold">Total</p>
                                    </th>
                                    <td class="px-6 py-4">
                                        <!-- 2021/2022 Association Dues -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- paid -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="font-bold">Ghs 1,000.00</p>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>



                    <hr class="mt-[6rem] mb-2">


                    <!-- footer  -->
                    <div class="flex res:flex-wrap justify-between items-center">
                        <div>
                            <img class="w-[10rem]" src="{{asset('imgs/ams-logo-full.png')}}" alt="">
                        </div>
                        <div>
                            <p class="text-[0.7rem] font-bold">info@integrisgh.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
