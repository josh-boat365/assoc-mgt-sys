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
                        <img class="rounded w-36 h-36" src="{{ asset('images/'.Auth::user()->profile_image) }}" alt="Extra large avatar">
                        @endempty
                    </div>
                    <div class="flex flex-col res:flex-wrap">
                        @empty(Auth::user()->firstname && Auth::user()->surname)
                        <p class="font-bold text-[2rem]">-----</p>
                        @else
                        <p class="font-bold text-[2rem]">{{ Auth::user()->firstname }} {{ Auth::user()->surname}}</p>
                        @endempty

                        @empty(Auth::user()->region_of_company)
                        <p>-----</p>
                        @else
                        <p><i class="fa-solid fa-map-location-dot"></i> &nbsp; {{Auth::user()->region_of_company}}</p>
                        @endempty

                        <p><i class="fa-solid fa-envelope"></i> &nbsp; {{Auth::user()->email}}</p>
                        <p><i class="fa-solid fa-user"></i> &nbsp; {{Auth::user()->username}}</p>

                        <span>
                            <i class="fa-solid fa-user-graduate"></i> &nbsp;

                            <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">BSc</span>
                            <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">MSc</span>
                            <span class="bg-gray-300 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">PhD</span>

                        </span>


                        <p>
                            @if (Auth::user()->dues == "not-paid")
                            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                Dues not paid
                            </span>
                            @else
                            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                Dues paid
                            </span>
                            @endif


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
                            @empty(Auth::user()->assoc_number)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->assoc_number}}</p>
                            @endempty


                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Joined since</h4>
                            @empty(Auth::user()->joined_year)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->joined_year}}</p>
                            @endempty
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Date of Birth</h4>
                            @empty(Auth::user()->date_of_birth)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->date_of_birth}}</p>
                            @endempty
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Gender</h4>
                            @empty(Auth::user()->gender)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->gender}}</p>
                            @endempty
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Tin</h4>
                           @empty(Auth::user()->tin)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->tin}}</p>
                            @endempty
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Status</h4>
                            @empty(Auth::user()->dues)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->dues}}</p>
                            @endempty
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Primary Contact</h4>
                            @empty(Auth::user()->primary_contact)
                                 <p>-----</p>
                            @else
                             <p>(+233) {{Auth::user()->primary_contact}}</p>
                            @endempty
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Secondary Contact</h4>
                            @empty(Auth::user()->secondary_contact)
                                 <p>-----</p>
                            @else
                             <p>(+233) {{Auth::user()->secondary_contact}}</p>
                            @endempty
                        </div>
                    </div>
                    <div class="mt-2 flex gap-5 res:flex-wrap">
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Region</h4>
                            @empty(Auth::user()->region_of_company)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->region_of_company}}</p>
                            @endempty
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
                            @empty(Auth::user()->company_name)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->company_name}}</p>
                            @endempty
                        </div>
                        <div class="w-[30rem]">
                            <h4 class="font-bold">Company Address</h4>
                            @empty(Auth::user()->company_address)
                                 <p>-----</p>
                            @else
                             <p>{{Auth::user()->company_address}}</p>
                            @endempty
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
