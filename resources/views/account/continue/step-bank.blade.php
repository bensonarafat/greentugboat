<form class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5" method="POST" action="{{ route("continue.bank.step") }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center pb-4 pt-4">
        <h1 class="font-black text-[#1d8861] text-2xl uppercase">Getting Paid</h1>
        <span class="font-bold">Bank details</span>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Bank Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="bank" type="text" required value="@if(session()->has("bank")){{ session()->get("bank") }}@endif">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Account name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="account_name" type="text" required value="@if(session()->has("account_name")){{ session()->get("account_name") }}@endif">
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                <div class="flex">
                    <span>Account Number</span>
                    <span  data-tooltip-target="tooltip-light" data-tooltip-style="light">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    <div id="tooltip-light" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 tooltip">
                        @if(auth()->user()->is_vendor)
                            <strong>Vendor</strong>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> Your bank details are required for payment transfers from sponsors.</p>
                            <hr class="my-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endif

                        @if(auth()->user()->is_sponsor)
                            <strong>Sponser</strong>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> Your bank details are required in case of  refund.</p>
                            <hr class="my-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endif
                        @if(auth()->user()->is_volunteer)
                            <strong>Volunteer</strong>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> Your bank details are required in case of covering payments for miscellaneous expenses you might require in the course Of carrying out your task.</p>

                        @endif
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>


            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="account_number" type="number" required value="@if(session()->has("account_number")){{ session()->get("account_number") }}@endif">



        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">

                <div class="flex">
                    <span>BVN</span>
                    <span  data-tooltip-target="tooltip-light2" data-tooltip-style="light">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                     </span>
                     <div id="tooltip-light2" role="tooltip" class="sm:w-1/2 md:w-1/2 inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 tooltip">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> The BVN is a compulsory requirement for both the vendor and volunteer. should a sponsored task be therefore left unattended and without refund thereof, GTI is obligated to blacklist the BVN details of such user.</p>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="bvn" type="number" required value="@if(session()->has("bvn")){{ session()->get("bvn") }}@endif">

        </div>
    </div>

    <div class="flex -mx-3 mb-6 pl-5 pr-5">
        <a href="{{ route("back.registration", "company") }}" class="btn bg-[#1d8861] w-full m-1 py-2.5"><strong class="uppercase text-white">Back</strong></a>
        <button type="submit" class="btn bg-[#1d8861] m-1 w-full  py-2.5" style="background: rgb(29 136 97 / 1);"><strong class="uppercase text-white">Submit</strong></button>
    </div>
</form>
