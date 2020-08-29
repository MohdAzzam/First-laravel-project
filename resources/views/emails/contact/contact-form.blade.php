@component('mail::message')
#Thank You For Your Massage


<strong>Name</strong> {{$data['name']}}

<strong>Email</strong>{{$data['email']}}

<strong>Message</strong>

{{$data['massage']}}
@endcomponent
