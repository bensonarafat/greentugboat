<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Payment Instructions</title>
</head>
<body>
    <div class="wrapper">
        <div>
            <h2>Greentugboat
                <br/>
                <small>Name: {{ $name }}</small>
                <br/>
                <small>Mobile: {{ $mobile }}</small>
                <br/>
                <small>Email: {{ $email }}</small>
            </h2>
            <h1>Total #{{ number_format($amount, 2) }}</h1>
        </div>
        <table border="1">
            <thead>
                <tr>
                <th>Details</th>
                <th>Amount</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $budget = $budget;
                    $spent = 0.00;
                @endphp
                @foreach ($projects as $row)


                @php

                    $user = null;
                    //get vendor_id details
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
                        <strong >{{ $row->title }}</strong>  <br/>
                        <span>Account Details</span> <br/>
                        @if($user)
                        <span> <strong class="ml-3">Account Name: </strong> {{ $user->account_name }}</span> <br/>
                        <span> <strong class="ml-3">Account Number: </strong> {{ $user->account_number }} </span> <br/>
                        <span> <strong class="ml-3">Bank:</strong> {{ $user->bank }}</span> <br/>
                        <span> <strong class="ml-3">Amount:</strong> {!! "N" . number_format($amount, 2) !!} </span> <br/>
                        @else
                            <span>Please contact your support team for more details on this project. </span>
                        @endif

                    </td>
                    <td>{!! "N" . number_format($amount, 2) !!}</td>

                    </tr>
                    @php
                        $spent+= $amount;
                        $budget = $to_pay;
                    @endphp
                @endforeach
            </tbody>

        </table>
    </div>
<style>

    @page{
        margin: 0cm 0cm 0cm 0cm;

    }
    .wrapper{
            margin: 0.1cm 0cm 0.1cm 0.1cm;
            padding: 0.5cm !important;
    }

    table{
        width: 100%;
        padding:5px;
        margin: 0px;
        border-collapse:collapse;
    }
    tr, td, th {
        padding:5px;
        margin: 0px;
        border-collapse:collapse;
    }

</style>
</body>
</html>
