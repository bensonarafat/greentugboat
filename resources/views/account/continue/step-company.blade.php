<form class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5" method="POST" action="{{ route("continue.step.company") }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center pb-4 pt-4">
        <h1 class="font-black text-[#1d8861] text-2xl uppercase">Where you work</h1>
        <span class="font-bold">Company details</span>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Company name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="company_name" type="text" required value="@if(session()->has("company_name")){{ session()->get("company_name") }}@endif">
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Company RC
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="company_rc" type="text" required value="@if(session()->has("company_rc")){{ session()->get("company_rc") }}@endif">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Position
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="position" type="text" required value="@if(session()->has("position")){{ session()->get("position") }}@endif">
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Company Address
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="company_address" type="text" required value="@if(session()->has("company_address")){{ session()->get("company_address") }}@endif">
        </div>
    </div>

    <div class="flex mb-6 pl-5 pr-5">
        <a href="{{ route("back.registration", "two") }}" class="btn bg-[#1d8861] w-full m-1 py-2.5"><strong class="uppercase text-white">Back</strong></a>
        <button type="submit" class="btn bg-[#1d8861] m-1 w-full  py-2.5" style="background: rgb(29 136 97 / 1);"><strong class="uppercase text-white">Continue</strong></button>
    </div>
</form>
