@component('mail::message')

<h3>Project Application Request<h3>

{{ $data['user']->firstname }} applied to <b> {{ $data['project']->title }} </b> as a {{ ucfirst($data['type']) }}

<div>
    Project Details
    <ul>
        <li>Title: {{ $data['project']->title }}</li>
        <li>budget: {{ $data['project']->budget }}</li>
        <li>Raised: {{ number_format($data['project']->raised, 2) }}</li>
        <li>Priority: @if($data['project']->priority == "1")
                        Low
                      @elseif ($data['project']->priority == "2")
                       Medium
                       @elseif($data['project']->priority == "3")
                       High
                    @else
                        Very High
                    @endif
        </li>
    </ul>
</div>

<strong>You can open this project by clicking <a href="{{ config("app.url") }}account/projects/view/{{ $data['project']->id }}">here</a> </strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
