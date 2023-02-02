@extends("layouts.app")
@section("title", "Search - " . request()->get("q"))
@section("content")
<!-- Page Breadcumb -->
<section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">
    <div class="sectionShape sectionShape--top">
      <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Gainioz">
    </div>
    <div class="sectionShape sectionShape--bottom">
      <img src="image/shapes/pagebreadcumbShapeBottom.svg" alt="Gainioz">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="pageTitle text-center">
            <h2 class="pageTitle__heading text-white text-uppercase mb-25">The GREEN TUGBOAT INITIATIVE</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Page Breadcumb End -->
    <!-- About Feature -->
    <div class="about position-relative pt-20 pb-130">
        <div class="container">
          <div class="row">
            <div class="row gx-3">
                @foreach ($projects as $d)
                    @include("components.project.project")
                @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- About Feature -->
@endsection
