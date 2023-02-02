@component('mail::message')

<h3>Hello, {{ $data['user']->firstname }}<h3>

Thank you for applying as a {{ ucfirst($data['type']) }} to  <b> {{ $data['project']->title }} </b>

We'll get back to you if your profile fit the project.

<strong>You can monitor this project by clicking <a href="{{ config("app.url") }}project/{{ $data['project']->id }}/{{ $data['project']->slug }}">here</a> </strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
