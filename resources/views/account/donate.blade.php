@extends("layouts.dashboard.app")
@section("title", "Donate - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")




    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Donate</a>
          </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Donate</h4>

          <div>
            <a href="{{ route("submit.payment.proof") }}" class="btn btn-primary">Submit Payment Proof</a>
          </div>
        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            @if(!request()->has("set"))
                            <div>
                                <form action="" method="get">
                                    <input type="hidden" name="set" value="true">
                                    <h3>Budget</h3>
                                    <section>
                                        <div style="display:flex;justify-content: center; padding-bottom:20px;">
                                            <h4>Enter budget</h4>
                                        </div>
                                        <div style="display:flex;justify-content: center;">
                                            <h1 style="font-size:80px;">@php echo naira() @endphp</h1>
                                            <input type="text" required name="budget" id="budgetinput" class="budgetinput" pattern="[0-9]*" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false">
                                            <button type="submit" class="btn btn-primary px-10" style="margin-bottom: 15px;padding-left: 40px;padding-right: 40px;margin-left: 10px;">
                                                <strong>Go</strong>
                                            </button>
                                        </div>
                                    </section>
                                </form>
                            </div>
                            @else

                            @if(!session()->has("projects"))
                            <form action="{{ route("set.donate.handler") }}" method="post">
                                @csrf
                                <input type="hidden" name="budget" value="{{ request()->get("budget") }}">
                                <div class="card shadow-base bd-0">
                                    <div class="card-header pd-20 bg-transparent">
                                    <h6 class="card-title tx-uppercase tx-12 mg-b-0">Donate {!! naira() . number_format(request()->get("budget"), 2) !!}</h6>
                                    <p>
                                        We have selected some best projects for you to sponsor, you can also unselect anyone of your choice.
                                    </p>
                                    </div><!-- card-header -->
                                    <table class="table table-responsive mg-b-0 tx-12">
                                    <thead>
                                        <tr class="tx-10">
                                        <th class="pd-y-5">Title</th>
                                        <th class="pd-y-5 tx-right">Budget</th>
                                        <th class="pd-y-5 tx-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $row)
                                            <tr>
                                            <td>
                                                <a href="/project/{{ $row->id }}/{{ $row->slug }}" target="_blank" class="tx-inverse tx-14 tx-medium d-block">{{ $row->title }}</a>
                                                <span class="tx-11 d-block"><span class="square-8 bg-danger mg-r-5 rounded-circle"></span> {!! naira() . number_format($row->budget - $row->raised, 2) !!} remaining</span>
                                            </td>
                                            <td class="valign-middle tx-right">{!! naira() . number_format($row->budget, 2) !!}</td>
                                            <td class="" style="text-align: center">
                                                <input checked type="checkbox" name="selected[]" value="{{ $row->id }}">
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div><!-- card-footer -->
                                </div><!-- card -->
                            </form>
                            @else
                                @php

                                    $projectsx = \App\Models\Project::whereIn("id", session()->get("projects"))->get();
                                @endphp
                                <form  method="post" action="{{ route("sponsor.pdf") }}">
                                    <input type="hidden" name="budget" value="{{ request()->get("budget") }}">
                                    @csrf

                                    <div class="card shadow-base bd-0">
                                        <div class="card-header pd-20 bg-transparent">
                                        <h6 class="card-title tx-uppercase tx-12 mg-b-0"> Download the payment document, which you will take to your bank after that. You submit payment proof</h6>

                                        </div><!-- card-header -->
                                        <table class="table table-responsive mg-b-0 tx-12">
                                        <thead>
                                            <tr class="tx-10">
                                            <th class="pd-y-5">Details</th>
                                            <th class="pd-y-5 tx-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $budget = floatval(request()->get("budget"));
                                                $spent = 0.00;
                                            @endphp
                                            @foreach ($projectsx as $row)


                                            @php

                                                $user = null;
                                                //get vendor details
                                                if($row->vendor_id){
                                                    $user = \App\Models\User::find($row->vendor_id);
                                                }
                                                $remain = $row->budget - $row->raised;


                                                $to_pay = $budget - $remain;
                                                if($remain >  $budget){
                                                    $amount = $budget;
                                                }else{
                                                    $amount = $remain;
                                                }

                                            @endphp
                                                <tr>
                                                <td>
                                                    <a href="/project/{{ $row->id }}/{{ $row->slug }}" target="_blank" class="tx-inverse tx-14 tx-medium d-block">{{ $row->title }}</a>
                                                    <span class="tx-11 d-block"><span class="square-8 bg-danger mg-r-5 rounded-circle"></span> Account Details</span>
                                                    @if($user)
                                                    <span class="tx-11 d-block"> <strong class="ml-3">Account Name: </strong> {{ $user->account_name }}</span>
                                                    <span class="tx-11 d-block"> <strong class="ml-3">Account Number: </strong> {{ $user->account_number }} </span>
                                                    <span class="tx-11 d-block"> <strong class="ml-3">Bank:</strong> {{ $user->bank }}</span>
                                                    <span class="tx-11 d-block"> <strong class="ml-3">Amount:</strong> {!! naira() . number_format($amount, 2) !!} </span>
                                                    @else
                                                        <span class="tx-11 d-block">Please contact your support team for more details on this project. </span>
                                                    @endif

                                                </td>
                                                <td class="valign-middle tx-right">{!! naira() . number_format($amount, 2) !!}</td>

                                                </tr>
                                                @php
                                                    $spent+= $amount;
                                                    $budget = $to_pay;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        </table>
                                        <input type="hidden" name="amount" value="{{ $spent }}">

                                        <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                            <button type="submit" class="btn btn-primary" type="submit">SPONSOR with {!! naira() . number_format($spent, 2) !!}</button>
                                        </div><!-- card-footer -->
                                    </div><!-- card -->
                                </form>


                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    <style>
        .budgetinput{
            width: 100%;
            max-width: 300px;
            height:80px;
            border:none !important;
            font-size:80px;
            font-weight: 900;
            background: #dde1e5;
        }
        .budgetinput:active {
            border: none !important;
        }
        .budgetinput:focus{
            border-color: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline: none !important;
        }
    </style>
@endsection
