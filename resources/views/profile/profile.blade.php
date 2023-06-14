<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="w-[6rem] ml-[10%] mt-5  text-center p-2 shadow rounded">
        <a href="{{route('dashboard')}}">
            <span><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 "></i>&nbsp;<spanclear>Back</span></span>
        </a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Profile card -->
                <div class="flex res:flex-wrap gap-5">
                    <div>
                        @empty(Auth::user()->profile_image)

                        <div class=" relative rounded w-36 h-36 overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <svg class="absolute w-30 h-30 mx-auto text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        @else
                        <!-- <img class="w-10 h-10 p-1 rounded-full " src="/docs/images/people/profile-picture-5.jpg" alt="Profile Image"> -->
                        <img class="rounded w-36 h-36" src="/docs/images/people/profile-picture-5.jpg" alt="Extra large avatar">
                        @endempty
                    </div>
                    <div class="flex flex-col res:flex-wrap">
                        <p class="font-bold text-[2rem]">Joshua Nyarko Boateng</p>
                        <p><i class="fa-solid fa-map-location-dot"></i> &nbsp; Greater Accra</p>
                        <p><i class="fa-solid fa-envelope"></i> &nbsp; {{Auth::user()->email}}</p>
                        <p><i class="fa-solid fa-user"></i> &nbsp; {{Auth::user()->username}}</p>

                        <span>
                            <i class="fa-solid fa-user-graduate"></i> &nbsp;

                            <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">BSc</span>
                            <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">MSc</span>
                            <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">PhD</span>

                        </span>


                        <p>
                            <span class="bg-green-500 border border-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full" style="color: white !important;">Dues paid</span>
                            <span class="bg-red-500 border border-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full" style="color: white !important;">Dues not paid</span>
                            </p>

                    </div>
                </div>
                <!-- Sperator  -->
                <div class="w-full mt-5 mb-5 rounded bg-gray-300 h-[0.1rem]"></div>
                <!-- Profile information -->
                <div>
                    <h2 class="mt-5 text-[1.4rem] font-bold">Profile Information</h2>

                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Association Number</h4>
                            <p>1234</p>
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Joined since</h4>
                            <p>2005</p>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Date of Birth</h4>
                            <p>14th August, 1999</p>
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Gender</h4>
                            <p>Male</p>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Tin</h4>
                            <p>P0123456</p>
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Status</h4>
                            <p>Dues not paid</p>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Primary Contact</h4>
                            <p>(+233) 0550746180</p>
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Secondary Contact</h4>
                            <p>---------</p>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Region</h4>
                            <p>Greater Accra</p>
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Areas of Specialty</h4>
                            <span>
                                <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Software Engineering</span>
                                <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Artificial Intelligence</span>
                                <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Project Management</span>
                            </span>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Company Name</h4>
                            <p>Integrisgh 360</p>
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Company Address</h4>
                            <p>5th Floor, No. 8 Blohum Street, Dzorwulu.</p>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Office Locations</h4>
                            <span>
                                <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Northern Region</span>
                                <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Bono Region</span>
                                <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Ashanti Region</span>
                            </span>
                        </div>
                        <!-- <div class="w-[30rem]">
                            <h4 class="font-bold">Company Address</h4>
                            <p>5th Floor, No. 8 Blohum Street, Dzorwulu.</p>
                        </div> -->
                    </div>
                </div>

            </div>


        </div>
    </div>
</x-app-layout>
