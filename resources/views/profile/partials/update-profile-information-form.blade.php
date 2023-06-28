<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>
        <span style="color: red !important;" class="text-xs relative top-[-0.5rem]">Note profile information must be fully updated.</span>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex res:flex-wrap gap-5">
            <div class="w-[20rem]">
                <x-input-label for="firstname" :value="__('Association Number  *')" />
                <x-text-input id="association_id" readonly name="association_id" type="text" class="mt-1 block w-full" :value="old('association_id', $user->association_id)" autofocus autocomplete="association_id" />
                <x-input-error class="mt-2" :messages="$errors->get('association_id')" />
            </div>
            <!-- <div class="w-[20rem]">
                <x-input-label for="profile_image" :value="__('Profile Image *')" />
                <input name="profile_image" type="file" class="mt-1 border border-gray-400 block w-full" :value="old('profile_image', $user->profile_image)" accept=".png,.jpg,.jpeg" >
                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
            </div> -->

        </div>

        <div class="flex res:flex-wrap gap-5 ">
            <div class="w-[20rem]">
                <x-input-label for="firstname" :value="__('Firstname *')" />
                <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" autofocus autocomplete="firstname" />
                <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
            </div>
            <div class="w-[20rem]">
                <x-input-label for="surname" :value="__('Surname *')" />
                <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" autofocus autocomplete="surname" />
                <x-input-error class="mt-2" :messages="$errors->get('surname')" />
            </div>
            <div class="w-[20rem]">

                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender *</label>
                <select id="gender" name="gender" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" value={{old('gender','$user->gender')}} autofocus autocomplete="gender">
                    <option selected>---- Choose gender ----</option>
                    <option value="Male" @if( $user->gender == 'Male') selected @endif>Male</option>
                    <option value="Female" @if($user->gender == 'Female') selected @endif>Female</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>
        </div>


        <div class="flex res:flex-wrap gap-5">
            <div class="w-[20rem]">
                <x-input-label for="username" :value="__('Username *')" />
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" autofocus autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('username')" />
            </div>
            <div class="w-[20rem]">
                <x-input-label for="email" :value="__('Email *')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
                @endif
            </div>
            <div class="w-[20rem]">
                <x-input-label for="tin" :value="__('Tin *')" />
                <x-text-input id="tin" name="tin" type="text" class="mt-1 block w-full" :value="old('tin', $user->tin)" autofocus autocomplete="tin" />
                <x-input-error class="mt-2" :messages="$errors->get('tin')" />
            </div>
        </div>

        <div class="flex res:flex-wrap gap-5 ">
            <div class="w-[30.5rem]">
                <x-input-label for="date_of_birth" :value="__('Date of birth')" />
                <x-text-input id="date_of_birth" datepicker datepicker-autohide name="date_of_birth" type="text" class="mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" autofocus autocomplete="date_of_birth" />

                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>
            <div class="w-[30.5rem]">
                <x-input-label for="region_of_company" :value="__('Region  *')" />
                <select id="region_of_company" name="region_of_company" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" autofocus autocomplete="region_of_company">
                    <option selected>---- Choose region ----</option>
                    @foreach ($regions as $region)
                    <option value="{{$region}}" @if($user->region_of_company === old('region_of_company', $region)) selected @endif>{{ $region}}</option>
                    @endforeach

                </select>
                <x-input-error class="mt-2" :messages="$errors->get('region_of_company')" />
            </div>
            <!-- <div class="w-[20rem]">
                <x-input-label for="onboard_date" :value="__('Joined since')" />
                <x-text-input id="onboard_date" name="onboard_date" type="text" class="mt-1 block w-full" :value="old('onboard_date', $user->onboard_date)" autofocus autocomplete="onboard_date" />
                <x-input-error class="mt-2" :messages="$errors->get('onboard_date')" />
            </div> -->
        </div>

        <div class="flex res:flex-wrap gap-5 ">
            <div class="w-[30.5rem]">
                <x-input-label for="company_name" :value="__('Company name *')" />
                <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $user->company_name)" autofocus autocomplete="company_name" />
                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
            </div>
            <div class="w-[30.5rem]">
                <x-input-label for="company_address" :value="__('Company address  *')" />
                <x-text-input id="company_address" name="company_address" type="text" class="mt-1 block w-full" :value="old('company_address', $user->company_address)" autofocus autocomplete="company_address" />
                <x-input-error class="mt-2" :messages="$errors->get('company_address')" />
            </div>
        </div>
        <div class="flex res:flex-wrap gap-5 ">
            <div class="w-[30.5rem]">
                <x-input-label for="primary_contact" :value="__('Primary contact *')" />
                <x-text-input id="primary_contact" name="primary_contact" type="tel" class="mt-1 block w-full" :value="old('primary_contact', $user->primary_contact)" autofocus autocomplete="primary_contact" />
                <x-input-error class="mt-2" :messages="$errors->get('primary_contact')" />
            </div>
            <div class="w-[30.5rem]">
                <x-input-label for="secondary_contact" :value="__('Secondary contact')" />
                <x-text-input id="secondary_contact" name="secondary_contact" type="tel" class="mt-1 block w-full" :value="old('secondary_contact', $user->secondary_contact)" autofocus autocomplete="secondary_contact" />
                <x-input-error class="mt-2" :messages="$errors->get('secondary_contact')" />
            </div>

        </div>
        <div class="flex res:flex-wrap gap-5 ">
            <!-- <div class="w-[30.5rem]">
                <x-input-label for="primary_contact" :value="__('Other Company Branches')" />
                <x-text-input id="primary_contact" name="primary_contact" type="text" class="mt-1 block w-full" :value="old('primary_contact', $user->primary_contact)" autofocus autocomplete="primary_contact" />
                <x-input-error class="mt-2" :messages="$errors->get('primary_contact')" />
            </div> -->
            <div class="w-[62rem]">
                <x-input-label for="area_of_interests" :value="__('Interests')" />
                <span style="color: red !important;" class="text-xs">Multiple interests should be separated by a comma(,).</span>
                <x-text-input id="area_of_interests" name="area_of_interests" type="text" class="mt-0 block w-full" :value="old('area_of_interests', $user->area_of_interests)" autofocus autocomplete="area_of_interests" />
                <x-input-error class="mt-2" :messages="$errors->get('area_of_interests')" />
            </div>

        </div>

        <!-- <div>
            <x-input-label for="profile_image" class="mb-2" :value="__('Profile image')" />
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" name="profile_image" type="file" class="unhidden" />
                </label>
            </div>
        </div> -->

        <div class="w-[62rem]">
            <x-input-label for="academic_qualification" :value="__('Academic Qualifications')" />
            <span style="color: red !important;" class="text-xs">Multiple qualifications should be separated by a comma(,).</span>
            <x-text-input id="academic_qualification" name="academic_qualification" type="text" class="mt-0 block w-full" :value="old('academic_qualification', $user->academic_qualification)" autofocus autocomplete="academic_qualification" />
            <x-input-error class="mt-2" :messages="$errors->get('academic_qualification')" />
        </div>




        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
