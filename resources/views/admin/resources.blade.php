<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Resource') }}
            </h2>
            <div class="flex justify-between">
                <div class="flex justify-between">
                    <x-nav-link :href="route('admin.resources.table')" :active="request()->routeIs('admin.resources.table')">
                        <x-primary-button>Resource Table</x-primary-button>
                    </x-nav-link>
                </div>
            </div>
        </div>
    </x-slot>

    <x-auth-session-status class="mb-5" :status="session('status')" />
    <x-success-message class="mb-5" :success="session('success')" />
    <x-error-message class="mb-5" :fail="session('fail')" />

    <div class="mt-5 md:container md:mx-auto">
        <div class="w-full m-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('add.resource') }}">
                @csrf
                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <span class="relative text-gray-300 text-[0.6rem]">Can contain only letters and numbers</span>
                    <x-text-input id="title" class="block mt-1 mb-2 w-full placeholder:text-gray-300" type="text" name="title" :value="old('title')" autofocus autocomplete="title" placeholder="Enter title of resource eg:(Zoom for conference 2023)" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <span class="relative text-gray-300 text-[0.6rem]">Can contain only letters and numbers</span>
                    <x-text-area id="description" cols="30" rows="5" class="block mt-1 w-full placeholder:text-gray-300" type="text" name="description" :value="old('description')" autofocus autocomplete="description" placeholder="Give a short description about the resource" />
                    <span id="word_count" class="inline-flex float-right text-[.6rem] text-gray-400 ">225/225</span>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <!-- Link to Resource -->
                <div class="mt-4">
                    <x-input-label for="link" :value="__('Link to resource')" />
                    <x-text-input id="link" data-tooltip-target="tooltip-default" class="block mt-1 w-full placeholder:text-gray-300" type="text" name="link" :value="old('link')" autocomplete="link" placeholder="Enter link eg: meet.google.com/xeryd" />
                    <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 max-w-lg rounded-lg shadow-sm opacity-0 tooltip bg-gray-200 dark:bg-gray-900">
                        It is advisable to upload your preferred resource/document via a google drive and share the link by allowing anyone who has access to the link to view/download document.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <x-input-error :messages="$errors->get('link')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-green-button class="ml-4"> {{ __('Create Resource') }} </x-green-button>
                </div>
            </form>
        </div>


        <script>
            let description = document.getElementById("description");
            let word_count = document.getElementById("word_count");
            description.addEventListener("input", function() {
                word_count.textContent = description.value.length + "/225";
                if (description.value.length > 224) {
                    description.value = description.value.substring(0, 224);
                    word_count.style.color = "red";
                } else {
                    word_count.style.color = "green";
                }

            });
        </script>


    </div>
</x-app-layout>