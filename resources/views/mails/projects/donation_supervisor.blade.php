@component('mail::message')

<h3>Hello, {{ $data['supervisor']->firstname }}<h3>

You are been notified about the project you are supervising that N{{ number_format($data['donation']->amount, 2) }} has been donated by {{ \App\Models\User::find($data['donation']->user_id)->firstname . ' '. \App\Models\User::find($data['donation']->user_id)->lastname  }}

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
