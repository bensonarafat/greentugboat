@extends("layouts.app")
@section("title", "Privacy Policy")
@section("content")
<!-- Page Breadcumb -->
<section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">

    <div class="sectionShape sectionShape--top">
      <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Gainioz">
    </div>
    <div class="sectionShape sectionShape--bottom">
      <img src="{{ asset("image/shapes/pagebreadcumbShapeBottom.svg") }}" alt="Gainioz">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="pageTitle text-center">
            <h2 class="pageTitle__heading text-white text-uppercase mb-25">Privacy Policy</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Page Breadcumb End -->
  <!-- Donation Details -->
  <section class="donation pt-130 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="container">
            @php
                echo  pagesContent("privacy", "privacy", "privacy", false)->content;
            @endphp

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Donation Details End -->

  @endsection
