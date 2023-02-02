@component('mail::message')

<h3>Hello, {{ $data['volunteer']->firstname }}<h3>

We'll like to notify about the project you are volunteering to that {{ \App\Models\User::find($data['donation']->user_id)->firstname . ' '. \App\Models\User::find($data['donation']->user_id)->lastname  }}
donated N{{ number_format($data['donation']->amount,2 ) }} to project {{ $data['project']->title }}

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

