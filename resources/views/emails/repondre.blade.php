@component('mail::message')
# Repondre A vous Question
## {{$details['title']}}
{{$details['body']}}

@component('mail::button', ['url' => 'http://google.com'])
Home
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
