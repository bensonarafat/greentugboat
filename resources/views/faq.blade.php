    @extends("layouts.app")
    @section("title", "FAQ")
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
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">Ask Qustion</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
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
              <div class="ccFaqBlock" style="margin-right: 12%;">
                @php
                    $data = pagesContent("faq", "faq", "faq", true);
                @endphp
                @if($data)
                    @foreach ($data as $row)
                    <div class="accordion" id="accordionExample{{ $loop->iteration }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne{{ $loop->iteration }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseOne{{ $loop->iteration }}">
                                {{ $row->title }}
                            </button>
                            </h2>
                            <div id="collapseOne{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="headingOne{{ $loop->iteration }}" data-bs-parent="#accordionExample{{ $loop->iteration }}">
                            <div class="accordion-body" style="padding-left: 20px;padding-right: 20px;">
                                {{ $row->content }}
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Donation Details End -->

      @endsection
