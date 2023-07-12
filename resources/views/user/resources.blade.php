<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dues') }}
        </h2>
    </x-slot>

    <div class="w-[6rem] ml-[10rem] mt-5  text-center p-2 shadow rounded">
        <a href="{{route('admin.home')}}">
            <span><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 "></i>&nbsp;<span>Back</span></span>
        </a>
    </div>

    <h2 class=" text-[2rem] text-center">Resources</h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($Resources as $resource)
                        <h3 class="font-bold">{{ $resource->title }}</h3>
                        <div class="flex justify-between">
                            <p class="text-[0.85rem] link"> <i class="fa-solid fa-file"></i> {{ $resource->description }}</p>
                            <p class="text-[0.8rem] link">{{ $resource->created_at->diffForHumans() }}</p>
                            <p><a class="link2" href="{{ $resource->link }}"><i class="fa-solid fa-download"></i> Download</a></p>
                        </div>
                         <hr class="mt-[0.8rem] mb-1">
                    @endforeach
                    <style>
                        .link:hover{
                            color: rebeccapurple !important;
                            font-weight: bold;
                        }
                        .link2:hover{
                            color: green !important;
                            font-weight: bold;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
