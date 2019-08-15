@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! route('welcome') !!}">{{ trans('messages.back') }}</a>
        <br>
        <h4 style="text-align: center"><strong>{{ trans('messages.non renting message') }}</strong></h4>
    </div>
@endsection
