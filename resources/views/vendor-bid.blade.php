@extends("layouts.app")
@section("title", "Vendor - " . $project->title)
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
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">{{ $project->title }}</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
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
            @include("layouts.alert")
          <div class="row">
            <div class="col-lg-8 mb-30">
              <div class="innerWrapperx">
                <div class="donationDetails">
                    <div style="display:flex;">
                        <img src="{{ asset($project->featureimage) }}" alt="" style="width:132px;height:88px; object-fit:cover;"/>
                        <div class="" style="padding-left:20px;">
                            <h6 class="">
                                You're supporting <strong>{{ $project->title }}</strong>
                            </h6>

                        </div>
                    </div>

                    <form action="{{ route("store.bid.apply") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="m-form-field m-form-field--stacked mb3x m-donation-amount-field m-checkout-currency-field">
                            <div class="m-form-field-inner" style="margin-top: 10px;">
                                <label class="m-form-field-label m-form-field-label--prepend a-label" for="checkout-donation">
                                    <div class="heading-3">Enter bid amount</div>
                                </label>
                                <div class="m-checkout-currency-field-wrapper">
                                    <div class="m-checkout-currency-field-currency">
                                        <span class="m-checkout-currency-field-symbol">@php echo naira() @endphp</span>
                                        <span class="m-checkout-currency-field-abbr">NGN</span>
                                    </div>
                                    <input type="text" id="checkout-donation" name="amount" pattern="[0-9]*" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" autocomplete="off" inputmode="numeric" maxlength="5" validation="default" value="1000" class="m-checkout-currency-field-input a-text-input" required>
                                    <span class="m-checkout-currency-field-decimal">.00</span>
                                </div>

                                <label class="m-form-field-label m-form-field-label--prepend a-label mt-10" for="cv">
                                    <div class="heading-3">Upload CV (Optional)</div>
                                </label>
                                <input type="file" name="cv" id="cv" class="form-control">

                                <label class="m-form-field-label m-form-field-label--prepend a-label mt-10" for="invoice">
                                    <div class="heading-3">Upload Invoice (Optional)</div>
                                </label>
                                <input type="file" name="invoice" id="invoice" class="form-control">

                                <label class="m-form-field-label m-form-field-label--prepend a-label mt-10" for="description">
                                    <div class="heading-3">Cover letter (You can provide summaries of your previous job here)</div>
                                </label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Cover letter...." required></textarea>
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div style="margin-top:30px;">
                                    <input type="hidden" name="id" value="{{ $project->id }}">
                                    <button type="submit" class="btn" style="background-color:#eb9309; !important; width: 100%;padding-top:20px;padding-bottom:20px;"><strong style="color: white;">Submit</strong></button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
              </div>
            </div>

            <div class="col-lg-4 mb-30">
              <div class="sidebarLayout">

                <div class="innerWrapperSidebar mb-30">
                    <div class="sidebarWidget">
                      <div class="sidebarCategories">
                        <div class="featureBlock__donation__progress">
                            <div class="featureBlock__donation__bar">
                                <span class="featureBlock__donation__text skill-bar" data-width="{{ projectPercentage($project->id) }}%">{{ projectPercentage($project->id) }}%</span>
                                    <div class="featureBlock__donation__line">
                                    <span class="skill-bars">
                                        <span class="skill-bars__line skill-bar" data-width="{{ projectPercentage($project->id) }}%"></span>
                                    </span>
                                </div>
                                <strong>{{ count($donations) }} donations </strong>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Donation Details End -->

      <style>
        .mb3x {
            margin-bottom: 1.5rem!important;
        }
        .m-form-field-label--prepend {
            padding-bottom: 0.5rem;
        }
        .m-form-field-label {
            cursor: pointer;
            display: block;
            line-height: 1.5;
        }
        .heading-3, .heading-4, .heading-5, .heading-6, h3, h4, h5, h6 {
            font-size: 1rem;
            line-height: 1.5;
        }

        .m-donation-amount-field .m-checkout-currency-field-wrapper {
            font-weight: 900;
            padding: 0.5rem 0.75rem;
            width: 100%;
        }
        .m-checkout-currency-field-wrapper {
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #fff;
            border: 1px solid #c8c8c8;
            border-radius: 0.25rem;
            cursor: text;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            padding: 0.75rem 1rem;
        }
        .m-donation-amount-field .m-checkout-currency-field-currency {
            text-align: center;
        }
        .m-checkout-currency-field-currency {
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            padding-right: 0.5rem;
        }
        .m-donation-amount-field .m-checkout-currency-field-symbol {
            display: block;
            font-size: 1.5rem;
        }
        .m-donation-amount-field .m-checkout-currency-field-abbr {
            color: #333;
            display: block;
            font-size: .875rem;
        }
        .m-checkout-currency-field-abbr {
            color: #767676;
            font-size: .75rem;
            font-weight: 900;
            text-transform: uppercase;
        }
        .m-donation-amount-field .m-checkout-currency-field-input {
            font-size: 2.5rem;
            font-weight: 900;
            border: none;
        }
        .a-text-input {
            -webkit-appearance: none;
            background-color: #fff;
            border: 1px solid #c8c8c8;
            border-radius: 0.25rem;
            display: block;
            padding: 0.75rem 1rem;
            width: 100%;
        }

        .m-checkout-currency-field-input {
            background-color: transparent;
            border: none;
            color: #333;
            padding: 0;
            text-align: right;
        }
        .a-text-input {
            -webkit-appearance: none;
            background-color: #fff;
            border: 1px solid #c8c8c8;
            border-radius: 0.25rem;
            display: block;
            padding: 0.75rem 1rem;
            width: 100%;
        }
        .m-donation-amount-field .m-checkout-currency-field-decimal {
            font-size: 2.5rem;
        }
        .m-donation-amount-field .m-checkout-currency-field-wrapper {
            font-weight: 900;
            padding: 0.5rem 0.75rem;
            width: 100%;
        }
    </style>
@endsection
