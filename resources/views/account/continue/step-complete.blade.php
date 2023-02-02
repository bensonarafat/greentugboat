<form class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5" method="POST" action="{{ route("continue.complete.step") }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center pb-4 pt-4">
        <h1 class="font-black text-[#1d8861] text-2xl uppercase">Complete Registration</h1>
        <span class="font-bold">Well done</span>
    </div>
    <div class="items-center flex justify-center mb-5">
        <div>
            <img src="{{ asset("assets/dashboard/img/check.svg") }}" alt="" style="width: 100px;">
        </div>
    </div>

    <div class="flex mb-6 pl-5 pr-5">
        <a href="{{ route("back.registration", "two") }}" class="btn bg-[#1d8861] w-full m-1 py-2.5"><strong class="uppercase text-white">Back</strong></a>

        <button type="submit" class="btn bg-[#1d8861] m-1 w-full  py-2.5" style="background: rgb(29 136 97 / 1);"><strong class="uppercase text-white">Submit</strong></button>
    </div>
</form>
