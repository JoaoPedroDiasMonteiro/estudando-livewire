@component('mail::message')
# Hello {{$user->name}},

Welcome to the {{config('app.name')}}! <br>

To get started, please click the button below to verify your email address. <br>
@component('mail::button', ['url' => '/'])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
