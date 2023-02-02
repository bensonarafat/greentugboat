@component('mail::message')

<h3>Hello, {{ $data['sponsor']->firstname }}<h3>

Thank you for your donations to {{ $data['project']->title }}

Your payment have been approved!!
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
