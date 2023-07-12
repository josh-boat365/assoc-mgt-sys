<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dues') }}
        </h2>
    </x-slot>

    <div class="w-[6rem] ml-[10rem] mt-5  text-center p-2 shadow rounded">
        <a href="{{route('dues.view')}}">
            <span><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 "></i>&nbsp;<span>Back</span></span>
        </a>
    </div>

    <h2 class=" text-[2rem] text-center">Invoice Details - Dues Payment</h2>

    <div class="mt-3 max-w-3xl m-auto">

        <x-auth-session-status class="mb-5" :status="session('status')" />
        <x-success-message class="mb-5" :success="session('success')" />
        <x-error-message class="mb-5" :fail="session('fail')" />

    </div>

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
                            <p class="font-bold">Invoice</p>
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
                            <p class="font-bold">{{Auth::user()->firstname}} {{Auth::user()->surname}} </p>
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
                                        Qty
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
                                        2021/2022 Association Dues
                                    </th>
                                    <td class="px-6 py-4">
                                        <!-- 2021/2022 Association Dues -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- paid -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="font-thin">Ghs 2,000.00</p>
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
                                        <p class="font-bold">Ghs 2,000.00</p>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <form id="paymentForm" action="#" method="post">
                            @csrf
                            <input type="hidden" name="association_id" value="{{Auth::user()->association_id}}">
                            <input type="hidden" id="email" name="email" value="{{Auth::user()->email}}">
                            <input type="hidden" id="amount" name="amount" value="2000">
                            <div class="mt-5 relative float-right">

                                <x-green-button class="ml-4" onclick="payWithPaystack(event)"> {{ __('Pay Annual Dues') }} </x-green-button>

                            </div>

                        </form>
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
                        <script>
                            const paymentForm = document.getElementById('paymentForm');
                            paymentForm.addEventListener("submit", payWithPaystack, false);

                            function payWithPaystack(e) {
                                e.preventDefault();

                                let handler = PaystackPop.setup({
                                    key: '{!!  $ps_pk !!}', // Replace with your public key
                                    email: document.getElementById("email").value,
                                    amount: document.getElementById("amount").value * 100,
                                    currency: 'GHS',
                                    ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                    // label: "Optional string that replaces customer email"
                                    onClose: function() {
                                        alert('Window closed.');
                                    },
                                    callback: function(response) {
                                        let reference = response.reference;
                                        //    console.log(reference);
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.ajax({
                                            type: "GET",
                                            url: "{{URL::to('home/dues/pay/verify')}}/" + reference,
                                            success: function(response) {
                                                // $.ajax({
                                                //     url: "{{ route('get.payment.details') }}",
                                                //     type: "POST",
                                                //     data: {
                                                //         data: response
                                                //     }
                                                // });
                                                console.log(response);
                                            },
                                            error: function(xhr, status, error) {
                                                console.log(error);
                                            }

                                        });

                                    }
                                });

                                handler.openIframe();
                            }
                        </script>
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
