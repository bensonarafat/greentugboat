@extends("layouts.app")
@section("title", "Donate - " . $project->title)
@section("content")
<link rel="stylesheet" href="{{ asset("css/donate.css") }}">
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
        <div class="innerWrapper">
        <div class="donationDetails">
            <div style="display:flex;">
                <img src="{{ asset($project->featureimage) }}" alt="" style="width:132px;height:88px; object-fit:cover;"/>
                <div class="" style="padding-left:20px;">
                    <h6 class="">
                        You're supporting <strong>{{ $project->title }}</strong>
                    </h6>
                </div>
            </div>

            @if($donation_exists)
            <div style="margin-top: 20px">
                <h4 >My Donations</h4>
            </div>
            @php
                $statuses = ["active", "pending", "declined"];
                $mydonations = \App\Models\Donation::where(["user_id" => Auth::user()->id, "project_id" => $project->id ])->whereIn("status", $statuses)->latest()->get();
            @endphp
            <table class="table table-responsive">
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Receipt</th>
                    <th>Status</th>
                </tr>
                @foreach ($mydonations as $myd)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($myd->create)->format("Y-m-d") }}</td>
                        <td>{!! naira() . number_format($myd->amount, 2) !!}</td>
                        <td>
                            <a href="{{ asset($myd->image) }}" download=""><i class="fa fa-download"></i> </a>
                        </td>
                        <td><strong><small>{{ $myd->status; }}</small></strong></td>
                    </tr>
                @endforeach
            </table>
            @endif


            <form action="{{ route("donation.payment") }}" method="post">
                @csrf
                <div class="m-form-field m-form-field--stacked mb3x m-donation-amount-field m-checkout-currency-field">
                    <div class="m-form-field-inner" style="margin-top: 10px;">
                        <label class="m-form-field-label m-form-field-label--prepend a-label" for="checkout-donation">
                            @if($project->vendor_id)
                            <div class="pt-2">
                                <b style="font-size:18px;">Vendor Details</b><br/>
                                <b>Company Name:</b> {{ \App\Models\User::find($project->vendor_id)->company_name }}<br/>
                                <b><a href="#"><i>view vendor profile</i></a></b>
                            </div>

                            <div>
                                <p>Please make payment to the following account nunber and attach proof of payment</p>
                                <b>Account Name: {{ \App\Models\User::find($project->vendor_id)->account_name }}</b>
                                <b>Account Number: {{ \App\Models\User::find($project->vendor_id)->account_number }}</b>
                                <b>Bank: {{ \App\Models\User::find($project->vendor_id)->bank }}</b>
                            </div>
                            @else
                                <div>
                                    <p>Payment method pending....</p>
                                </div>
                            @endif
                        </label>
                        <div class="heading-3">Enter your donation</div>
                        <div class="m-checkout-currency-field-wrapper">
                            <div class="m-checkout-currency-field-currency">
                                <span class="m-checkout-currency-field-symbol">@php echo naira() @endphp</span>
                                <span class="m-checkout-currency-field-abbr">NGN</span>
                            </div>
                            <input type="text" id="checkout-donation" name="donationAmount" pattern="[0-9]*" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" autocomplete="off" inputmode="numeric" maxlength="5" validation="default" value="1000" class="m-checkout-currency-field-input a-text-input">
                            <span class="m-checkout-currency-field-decimal">.00</span>
                        </div>
                        <div style="margin-top:10px;">
                            <label class="m-form-field-label m-form-field-label--prepend a-label" for="payment_proof">
                                <div class="heading-3">Upload proof of payment</div>
                            </label>
                            <input type="file" name="payment_proof" id="payment_proof" class="form-control">
                        </div>
                        <div style="margin-top:30px;">
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <button type="submit" class="btn" style="background-color:#eb9309; !important; width: 100%;padding-top:20px;padding-bottom:20px;"><strong style="color: white;">Continue</strong></button>
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
@endsection
