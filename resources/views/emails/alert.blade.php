@component('mail::message')
# Introduction

- {{ $name }}
- {{ $email }}
- {{ $msg }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
