@component('mail::message')
# Introduction

Welcome {{ $req['data']->name }}
The body of your message.

@component('mail::button', ['url' => aurl('recover_password/'.$req['token'])])
Button Text
@endcomponent

Thanks,<br>

{{ config('app.name') }}
@endcomponent
