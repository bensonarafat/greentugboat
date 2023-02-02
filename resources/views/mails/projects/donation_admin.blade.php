@component('mail::message')


<h3>Project Donation<h3>

You are been notified that {{ $data['project']->title }} received N{{ number_format($data['donation']->amount, 2) }} by {{ \App\Models\User::find($data['donation']->user_id)->firstname . ' '. \App\Models\User::find($data['donation']->user_id)->lastname  }}

<ul>
    <li>
        <strong>Amount</strong>:  N{{ number_format($data['donation']->amount,2 )}}
    </li>
    <li>
        <strong>Raised</strong>:  N{{ number_format($data['project']->raised, 2) }}
    </li>
    <li>
        <strong>Budget</strong>:  N{{  number_format($data['project']->budget, 2) }}
    </li>
</ul>
<strong>You can monitor this project by clicking <a href="{{ config("app.url") }}project/{{ $data['project']->id }}/{{ $data['project']->slug }}">here</a> </strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
