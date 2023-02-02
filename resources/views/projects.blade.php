@extends("layouts.app")
@section("title", "Projects")
@section("content")
<!-- Page Breadcumb -->
<section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">
    <div class="sectionShape sectionShape--top">
      <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="">
    </div>
    <div class="sectionShape sectionShape--bottom">
      <img src="image/shapes/pagebreadcumbShapeBottom.svg" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="pageTitle text-center">
            <h2 class="pageTitle__heading text-white text-uppercase mb-25">The GREEN TUGBOAT INITIATIVE</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">projects</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Page Breadcumb End -->
    <!-- About Feature -->
    <div class="about position-relative pt-125 pb-130">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <!-- Section Heading/Title -->
              <div class="sectionTitle text-center mb-70">
                <span class="sectionTitle__small justify-content-center">
                <i class="fa-solid fa-heart btn__icon"></i>
                Project listing
              </span>
                <h2 class="sectionTitle__big">Learn about our active projects</h2>
              </div>
              <!-- Section Heading/Title End -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="featureTab featureTab--style2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="category-all" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                                ALL
                            </button>
                        </li>
                    @foreach ($categories as $row)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="category-{{ $row->id }}" data-bs-toggle="tab" data-bs-target="#portal{{ $row->id }}" type="button" role="tab" aria-controls="portal{{ $row->id }}" aria-selected="false">{{ $row->name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content pt-55" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="category-all">
                        <div class="row gx-3">
                            @foreach ($projects as $d)
                                @include("components.project.project")
                            @endforeach
                        </div>
                  </div>
                    @foreach ($categories as $row)
                        @php
                            $projects = \App\Models\Project::where(['category_id' =>  $row->id])->whereNotIn("status", ['deleted'])->latest()->limit(20)->get();
                        @endphp
                        <div class="tab-pane fade" id="portal{{ $row->id }}" role="tabpanel" aria-labelledby="category-{{ $row->id }}">
                            <div class="row gx-3">
                                @foreach ($projects as $d)
                                    @include("components.project.project")
                                @endforeach
                            </div>
                      </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- About Feature -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $( document ).ready(function() {

      $('.applyVolunter').on("click", function(){
          let _this = $(this);
          _this.css("display","none");
          let mparent = _this.parent();
          let option = mparent.find(".volunteer-option");
          option.css("display","flex");
      })

      $('.js_application_back').on("click", function(){
          let _this = $(this);
          $('.volunteer-option').css("display","none");
          $('.applyVolunter').css("display","block");

      })
  });
</script>

@endsection
