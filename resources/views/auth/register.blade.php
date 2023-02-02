@extends('layouts.auth-app')
@section("title", "Register - " . config("app.name"))
@section('auth-contents')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<div class="md:container md:mx-auto mt-5 mb-5 flex justify-center">
    <div class="flex-col flex">
        <div class="items-center flex jusitfy-center self-center">
            <img src="{{ asset("image/logos/logo.png") }}" alt="">
        </div>

        @include("layouts.alert")
        <form class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5" method="POST" action="{{ route("register") }}" autocomplete="off" id="register_form">
            <div class="__step1">
                <div class="text-center pb-4 pt-4">
                    <h1 class="font-black text-[#1d8861] text-2xl uppercase">Register</h1>
                    <span class="font-bold">Already have an account? <a class="text-purple-600" href="{{ route("login") }}">Login</a></span>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstname">
                        First Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="firstname" name="firstname" type="text" required autocomplete="off">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastname">
                        Last Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="lastname" name="lastname" type="text" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Email Address
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="Email address" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="mobile">
                        Phone number
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="mobile" name="mobile" type="tel" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" name="password" type="password"  required>
                        <p class="text-gray-600 text-xs italic indicator"></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="confirm-password">
                        Confirm Password
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="confirm-password" name="password_confirmation" type="password" required onkeyup="check()">
                    <p class="text-gray-600 text-xs italic" id="password_message"></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nin">
                            NIN
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nin" name="nin" type="number" required >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label for="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="dob">
                            Date of Birth
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="dob" name="dob" placeholder="DD/MM/YYYY" pattern="[0-9]{1,2}/[0-9]{1,2}/[0-9]{4}" type="text" required >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            How do you want to participate ? <i>(You can select multiple)</i>
                        </label>
                        <div class="flex">
                            <label for="volunteer_checkbox">
                                <input type="checkbox" id="volunteer_checkbox" class="checktype" name="type[]" value="volunteer">
                                <span class="mr-2">Volunteer</span>
                            </label>
                            <label for="sponsor_checkbox">
                                <input type="checkbox" id="sponsor_checkbox"  class="checktype" name="type[]" value="sponsor" >
                                <span class="mr-2">Sponsor</span>
                            </label>
                            <label for="vendor_checkbox">
                                <input type="checkbox" id="vendor_checkbox"  class="checktype vendor_checked" name="type[]" value="vendor">
                                <span class="mr-2">Vendor</span>
                            </label>
                        </div>

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6 pl-5 pr-5">
                    <input type="hidden" name="back_url" value="{!! renameNamePath() !!}">
                    <button type="button" class="continue-btn __show_step_2 hidden btn bg-[#1d8861] w-full  py-2.5" style="background: rgb(29 136 97 / 1);" disabled><strong class="uppercase text-white">Continue</strong></button>
                    <button type="submit" class="__hide_this_button btn bg-[#1d8861] w-full  py-2.5" style="background: rgb(29 136 97 / 1);" disabled><strong class="uppercase text-white">Register</strong></button>
                </div>
            </div>
            <div class="__step2 hidden">
                <div class="text-center pb-4 pt-4">
                    <h1 class="font-black text-[#1d8861] text-2xl uppercase">Bank & Company Details</h1>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstname">
                        Bank Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 bank" name="bank" type="text" >
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastname">
                        Account name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 account_name" name="account_name" type="text" >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Account Number
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 account_number" name="account_number" type="number"  >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        BVN
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 bvn" name="bvn" type="number" >
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstname">
                        Company name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 company_name" name="company_name" type="text" >
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastname">
                        Company RC
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 company_rc" name="company_rc" type="text" >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Position
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 position" name="position" type="text"  >
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Company Address
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 company_address" name="company_address" type="text" >
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6 pl-5 pr-5">
                    <button type="button"  class="btn bg-[#1d8861] w-full  py-2.5 __go_back mb-2" style="background: rgb(29 136 97 / 1);"><strong class="uppercase text-white">Back</strong></button>
                    <button type="submit" class="btn bg-[#1d8861] w-full  py-2.5" style="background: rgb(29 136 97 / 1);"><strong class="uppercase text-white">Register</strong></button>
                </div>
            </div>
            @csrf
        </form>

        <div class="items-center flex jusitfy-center self-center">
            © {{ config("app.name") }} @php echo date("Y") @endphp all right receved
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>

    $(".checktype").on("change", function(){
        disableButton();
    })


   $('.vendor_checked').on("change", function(){
        let _this =  $(this);
        if(_this.is(":checked")){
            $(".__show_step_2").removeClass("hidden");
            $('.__hide_this_button').addClass("hidden");
            addAttr("add");
        }else{
            $(".__show_step_2").addClass("hidden");
            $('.__hide_this_button').removeClass("hidden");
            addAttr();
        }
   });

   function disableButton(){
    if ($('#register_form :checkbox:checked').length > 0){
            // one or more checkboxes are checked
            $('.__hide_this_button').attr("disabled", false);
        }
        else{
        // no checkboxes are checked
            $('.__hide_this_button').attr("disabled", true);
        }
   }
   function addAttr(handler = null){
    if(handler == "add"){
        $('.bank').attr("required", true);
        $('.account_name').attr("required", true);
        $('.account_number').attr("required", true);
        $('.bvn').attr("required", true);
        $('.company_name').attr("required", true);
        $('.company_rc').attr("required", true);
        $('.position').attr("required", true);
        $('.company_address').attr("required", true);
    }else{
        $('.bank').attr("required", false);
        $('.account_name').attr("required", false);
        $('.account_number').attr("required", false);
        $('.bvn').attr("required", false);
        $('.company_name').attr("required", false);
        $('.company_rc').attr("required", false);
        $('.position').attr("required", false);
        $('.company_address').attr("required", false);
    }


   }

   $('.__go_back').on("click", function(){
    $(".__step1").removeClass("hidden");
    $(".__step2").addClass("hidden");
   });

   $('.__show_step_2').on("click", function(){
    $(".__step1").addClass("hidden");
    $(".__step2").removeClass("hidden");
   })

   $( function() {
    $( "#dob" ).datepicker(
        { dateFormat: "dd/mm/yy" }
    );
    });

    function check(){
        let password = document.getElementById('password').value;
        let confirmpassword = document.getElementById('confirm-password').value;
        if(password != "" && confirmpassword != ""){
            if (password != confirmpassword) {
                document.getElementById('password_message').style.color = 'red';
                document.getElementById('password_message').innerHTML
                  = 'Password do not match';
                $('.__hide_this_button').attr("disabled", true);
                $('.continue-btn').attr("disabled", true);
            } else {
                document.getElementById('password_message').style.color = 'green';
                document.getElementById('password_message').innerHTML =
                    'Password Matched';
                $('.__hide_this_button').attr("disabled", false);
                $('.continue-btn').attr("disabled", false);
            }
            disableButton();
        }

    }
    let pattern = new RegExp("^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
        let inputToListen = document.getElementById('password'); // Get Input where psw is write
        let valide = document.getElementsByClassName('indicator')[0]; //little indicator of validity of psw

        inputToListen.addEventListener('input', function () { // Add event listener on input
            check();
            if(pattern.test(inputToListen.value)){
                valide.innerHTML = 'Password is strong';
                valide.style.color = 'green';
                $('.__hide_this_button').attr("disabled", false);
                $('.continue-btn').attr("disabled", false);
            }else{
                valide.innerHTML = 'Password is not strong enough'
                valide.style.color = 'red';
                $('.__hide_this_button').attr("disabled", true);
                $('.continue-btn').attr("disabled", true);
            }
            disableButton();
        });
</script>
@endsection
