
@component('mail::message')
    Name: {{$contact->name}}<br>
    Phone: {{$contact->phone}}<br>
    Email: {{$contact->email}}<br>
    Message: {{$contact->message}}<br>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
