@extends('layouts.app')
@section('body')
    {{-- <div class="absolute right-0 z-10 w-full h-full overflow-x-hidden transition duration-700 ease-in-out transform translate-x-0"
        id="checkout">
    </div> --}}
    <div class="flex flex-row items-end justify-end" id="cart">
        <div class="w-full h-auto px-4 py-4 overflow-x-hidden overflow-y-hidden bg-white llg:px-8 lg:py-14 md:px-6 md:py-8 lg:h-screen"
            id="scroll">
            <p class="pt-3 text-3xl font-black leading-10 text-gray-800 lg:text-4xl">Bag</p>
            <div class="py-8 border-t md:flex items-strech md:py-10 lg:py-8 border-gray-50">
                <div class="w-full md:w-4/12 2xl:w-1/4">
                    <img src="https://i.ibb.co/SX762kX/Rectangle-36-1.png" alt="Black Leather Bag"
                        class="hidden object-cover object-center h-full md:block" />
                    <img src="https://i.ibb.co/g9xsdCM/Rectangle-37.pngg" alt="Black Leather Bag"
                        class="object-cover object-center w-full h-full md:hidden" />
                </div>
                <div class="flex flex-col justify-center md:pl-3 md:w-8/12 2xl:w-3/4">
                    <p class="pt-4 text-xs leading-3 text-gray-800 md:pt-0">RF293</p>
                    <div class="flex items-center justify-between w-full pt-1">
                        <p class="text-base font-black leading-none text-gray-800">North wolf bag
                        </p>
                        <select aria-label="Select quantity"
                            class="px-1 py-2 mr-6 border border-gray-200 focus:outline-none">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                    <p class="pt-2 text-xs leading-3 text-gray-600">Height: 10 inches</p>
                    <p class="py-4 text-xs leading-3 text-gray-600">Color: Black</p>
                    <p class="text-xs leading-3 text-gray-600 w-96">Composition: 100% calf leather
                    </p>
                    <div class="flex items-center justify-between pt-5">
                        <div class="flex itemms-center">
                            <p class="text-xs leading-3 text-gray-800 underline cursor-pointer">Add
                                to favorites</p>
                            <p class="pl-5 text-xs leading-3 text-red-500 underline cursor-pointer">Remove</p>
                        </div>
                        <p class="text-base font-black leading-none text-gray-800">$9,000</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-full bg-gray-100">
            <div
                class="flex flex-col justify-between h-auto px-4 py-6 overflow-y-auto lg:h-screen lg:px-8 md:px-7 lg:py-20 md:py-10">
                <div>
                    <p class="text-3xl font-black leading-9 text-gray-800 lg:text-4xl">Summary</p>
                    <div class="flex items-center justify-between pt-16">
                        <p class="text-base leading-none text-gray-800">Subtotal</p>
                        <p class="text-base leading-none text-gray-800">$9,000</p>
                    </div>
                    <div class="flex items-center justify-between pt-5">
                        <p class="text-base leading-none text-gray-800">Shipping</p>
                        <p class="text-base leading-none text-gray-800">$30</p>
                    </div>
                    <div class="flex items-center justify-between pt-5">
                        <p class="text-base leading-none text-gray-800">Tax</p>
                        <p class="text-base leading-none text-gray-800">$35</p>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between pt-20 pb-6 lg:pt-5">
                        <p class="text-2xl leading-normal text-gray-800">Total</p>
                        <p class="text-2xl font-bold leading-normal text-right text-gray-800">
                            $10,240</p>
                    </div>
                    <button onclick="checkoutHandler1(true)"
                        class="w-full py-5 text-base leading-none text-white bg-gray-800 border border-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="fixed top-0 w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-90 sticky-0" id="chec-div">
    </div> --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let checkout = $("#checkout");
            let checdiv = $("#chec-div");
            let flag3 = false;

            const checkoutHandler = () => {
                if (!flag3) {
                    checkout.addClass("translate-x-full");
                    checkout.removeClass("translate-x-0");
                    setTimeout(function() {
                        checdiv.addClass("hidden");
                    }, 1000);
                    flag3 = true;
                } else {
                    setTimeout(function() {
                        checkout.removeClass("translate-x-full");
                        checkout.addClass("translate-x-0");
                    }, 1000);
                    checdiv.removeClass("hidden");
                    flag3 = false;
                }
            };

        })
    </script>
@endsection
