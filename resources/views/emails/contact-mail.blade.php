@component('mail::message')
Hi,
I am {{$name}}

{{$message}}

@component('mail::button', ['url' => 'https://yourwebsite.com'])
Visit Webpage
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
