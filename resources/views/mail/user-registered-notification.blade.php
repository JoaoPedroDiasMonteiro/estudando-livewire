@component('mail::message')
# New user has been registered.<br>
Details are as follows:<br>
User Name: {{ $user->name }}<br>
User Email: {{ $user->email }}<br>
Created At: {{ $user->created_at }}<br>
@endcomponent
