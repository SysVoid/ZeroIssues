@extends('emails.layouts.info')

@section('content')
    <p style="line-height: 2rem;">@lang('emails.auth.verify-email.greeting', ['first-name' => $user->first_name]),</p>
    <p style="line-height: 2rem;">@lang('emails.auth.verify-email.thanks', ['app-name' => config('app.name')])!</p>
    <p style="line-height: 2rem;">@lang('emails.auth.verify-email.uselink')</p>
    <p style="line-height: 2rem;"><a href="{{ $link }}" style="color: #0e95f9;">{{ $link }}</a></p>
@stop
