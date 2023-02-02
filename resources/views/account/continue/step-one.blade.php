<form class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5" method="POST" action="{{ route("continue.step.one") }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center pb-4 pt-4">
        <h1 class="font-black text-[#1d8861] text-2xl uppercase">Hello, {{ Auth::user()->firstname . ' '. Auth::user()->lastname }}</h1>
        <span class="font-bold">Fill in your details to get things started</span>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Gender
            </label>
            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="gender" required>
                <option value="">Select your gender</option>
                <option value="male" @if(session()->has("gender")) @if(session()->get("gender") == "male") selected @endif @endif>Male</option>
                <option value="female" @if(session()->has("gender")) @if(session()->get("gender") == "female") selected @endif @endif>Female</option>
            </select>
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Date of Birth
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="dob" type="date" required value="@if(session()->has("dob")){{ session()->get("dob") }}@endif">
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Mobile
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="0817******" name="mobile" type="tel" required value="@if(session()->has("mobile")){{ session()->get("mobile") }} @endif">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
               Photo
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="photo" type="file" @if(!session()->has("photo")) required @endif >
            <input type="hidden" name="photospan" value="@if(session()->get("photo")){{ session()->get("photo") }} @endif">
        </div>
    </div>

    <div class="flex mx-3 mb-6 pl-5 pr-5">
        <button type="submit" class="btn bg-[#1d8861] w-full m-1  py-2.5" style="background: rgb(29 136 97 / 1);"><strong class="uppercase text-white">Continue</strong></button>
    </div>
</form>
