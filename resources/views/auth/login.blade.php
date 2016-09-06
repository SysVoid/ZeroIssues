@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            @include('layouts.modules.forms.auth.login')
        </div>
    </div>
@stop
