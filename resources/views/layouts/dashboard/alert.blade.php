
  @if(Session::has("error"))
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong class="d-block d-sm-inline-block-force">Error! </strong> {{ session::get("error") }}
  </div>
  @endif
  @if(Session::has("success"))
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong class="d-block d-sm-inline-block-force">Success!</strong> {{ session::get("success") }}.
  </div><!-- alert -->
  @endif

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong class="d-block d-sm-inline-block-force">Error! </strong> Opps Something went wrong
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
  </div>
  @endif
