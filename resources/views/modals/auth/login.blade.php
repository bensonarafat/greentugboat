
  <!-- Modal -->
  <div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body">
            <div id="loginapp">
            <div style="justify-content: center;display: flex;">
                <img src="{{ asset("image/logos/logo.png") }}" alt="" style="width:100px; height:100px; object-fit:contain;">
            </div>
            <form class="pb-4 pt-2 px-1"  method="POST" action="{{ route("login") }}">
                @csrf
                <div class="text-center pb-2 pt-2">
                    <h6 class="font-black text-[#1d8861] text-2xl uppercase" style="color: rgb(29 136 97 / 1);">Login </h6>
                </div>
                <div class="alert alert-danger" role="alert" v-if="alert">
                   @{{ errormsg }}
                  </div>
                <div class="mb-3">
                  <label for="__email" class="form-label">Email address</label>
                  <input type="email" class="form-control" v-model="form.email" id="__email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text" v-if="erroremail" style="color: red;font-style: italic;font-size: small;">@{{ errormsg }}</div>
                </div>
                <div class="mb-3">
                  <label for="__password" class="form-label">Password</label>
                  <input type="password" class="form-control" v-model="form.password" id="__password" aria-describedby="passwordHelp">
                  <div id="passwordHelp" class="form-text" v-if="errorpassword" style="color: red;font-style: italic;font-size: small;">@{{ errormsg }}</div>
                </div>

                <div class="text-center pb-1 pt-1">
                    <a href="{{ route("password.request") }}" style="font-weight: 700;" class=" text-purple-600">Forgot your password? </a>
                </div>

                <input type="hidden" name="login_type" v-model="form.type" value="" id="login-type">
                <input type="hidden" name="login_id" value="" v-model="form.id" id="login-id">
                <button type="button" v-on:click="loginForm()" class="loginForm btn btn-block mt-2 rounded py-2" style="width: 100%;background-color: rgb(29 136 97 / 1);">
                    <div v-if="loading">
                        <i class="fas fa-spinner fa-spin" style="color: white;"></i>
                    </div>

                    <div v-else style="font-weight: bolder;color: white;text-transform: uppercase;" >
                        Submit
                    </div>
                </button>
              </form>
            </div>
        </div>

        <div class="modal-footer" style="justify-content: center !important;">
            <div class="text-center pb-1 pt-1">
                <span  style="font-weight: 700;">Don't have an account? <a class="text-purple-600" href="{{ route("register") }}">Register</a></span>
            </div>
          </div>

      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>

    $('.login__action').on("click", function(){

        let _this = $(this);
        let _type = _this.attr("data-type");
        let _id = _this.attr("data-id");
        $('#login-type').val(_type);
        $('#login-id').val(_id);
    });

  </script>
  <script src="{{ asset("js/axios.js") }}"></script>

  <script type="module">

    Vue.createApp({
      data() {
        return {
            form: {
                password: null,
                email : null,
            },
            erroremail: false,
            errormsg: "",
            errorpassword: false,
            alert: false,
            loading: false,
            currentpage: "{{ request()->path() }}"
        }
      },
    methods: {
        loginForm: function(){

            this.clear();
            this.loading = true;
            let $self = this;
            if(this.validate()){
                axios
                .post('/api/auth/login', {
                    "email" : $self.form.email,
                    "password": $self.form.password,
                })
                .then(function (response){
                    if(response.status == 200){
                        if(response.data.status){
                            let page = $self.currentpage;
                            if(page == "{{ config("app.url") }}" || page == "/"){
                                window.location.href = "{{ config("app.url") }}" + "account";
                            }else if($self.type != "" && $self.type == "donate"){
                                window.location.href = "{{ config("app.url") }}" + "donate/" + $self.id;
                            }else if($self.type != "" && $self.type == "vendor"){
                                window.location.href = "{{ config("app.url") }}" + "bid/" + $self.id;
                            }else if($self.type != "" && $self.type == "volunteer"){
                                window.location.href = "{{ config("app.url") }}" + "project-application/" + $self.id + "/volunteer";
                            }
                            else{
                                window.location.href = "{{ config("app.url") }}" + $self.currentpage;
                            }
                        }else{
                            $self.errormsg = response.data.message;
                            $self.alert = true;
                        }

                    }else{
                        $self.errormsg = "Oops, there was an error try again";
                        $self.alert = true;
                    }

                    $self.loading = false;
                })
                .catch(function (error){
                    $self.errormsg = "Oops, there was an error try again";
                    $self.alert = true;
                    $self.loading = false;
                });
            }

        },
        validate : function (){
            if(this.form.email == ""){
                this.erroremail = true;
                this.errormsg = "Email Address is required"
                return false;
            }
            if(this.form.password == ""){
                this.errorpassword = true;
                this.errormsg = "Password is required"
                return false;
            }

            return true;
        },
        clear : function(){
            this.email = false;
            this.password = false;
            this.alert = "";
            this.errormsg = "";
        }
    }
    }).mount('#loginapp')
  </script>
