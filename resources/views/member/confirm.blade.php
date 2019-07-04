@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! route('checkout') !!}">{{ trans('messages.back') }}</a>
        <br>
        <table class="table">
            <h2 style="text-align: center"><strong>{{ trans('messages.confirm info') }}</strong></h2>
            <thead>
            <tr>
                <th scope="col">{{ trans('messages.id') }}</th>
                <th scope="col">{{ trans('messages.user name') }}</th>
                <th scope="col">{{ trans('messages.vehicle name') }}</th>
                <th scope="col">{{ trans('messages.start date') }}</th>
                <th scope="col">{{ trans('messages.end date') }}</th>
                <th scope="col">{{ trans('messages.total') }}</th>
                <th scope="col">{{ trans('messages.created at') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rentings as $renting)
                <tr>
                    <th scope="row">{!! $renting['id'] !!}</th>
                    <td>{!! $renting['user']['name'] !!}</td>
                    <td>{!! $renting['vehicle']['name'] !!}</td>
                    <td>{!! $renting['start_date'] !!}</td>
                    <td>{!! $renting['end_date'] !!}</td>
                    <td>{!! $renting['total'] !!}</td>
                    <td>{!! $renting['created_at'] !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
