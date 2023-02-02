@component('mail::message')
Hello {{ $data['user']->firstname }},

We'll like to notify you that the status of your application has been updated.

<ul>
    <li><strong>Project:</strong> {{ $data['project']->title }}  </li>
    <li><strong style="color: red">STATUS:</strong> {{ $data['status'] }}</li>
</ul>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
