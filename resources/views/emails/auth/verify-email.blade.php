@extends('emails.layouts.info')

@section('content')
    <p style="line-height: 2rem;">Hello {{ $user->first_name }},</p>
    <p style="line-height: 2rem;">Thank you for adding your new email at {{ config('app.name') }}!</p>
    <p style="line-height: 2rem;">Please use the following link in order to verify your new email address:</p>
    <p style="line-height: 2rem;"><a href="{{ $link }}" style="color: #0e95f9;">{{ $link }}</a></p>
@stop
