@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <input type="search" name="search">
        <input class="btn btn-success" type="submit" value="{{ trans('messages.search') }}">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h3 class="my-4">{{ trans('messages.menu admin') }}</h3>
                <div class="list-group">
                    <a href="{{ route('home_renting')}}" class="list-group-item"
                       id="renting">{{ trans('messages.renting') }}</a>
                    <a href="{{ route('home_user')}}" class="list-group-item" id="user">{{ trans('messages.user') }}</a>
                    <a href="{{ route('home_vehicle')}}" class="list-group-item"
                       id="vehicle">{{ trans('messages.vehicle') }}</a>
                </div>
            </div>
            <div class="col-lg-9">
                <br>
                <table class="table" id="tb_rentings">
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
                            <th scope="row">{!! $renting->id !!}</th>
                            <td>{!! $renting->user_id !!}</td>
                            <td>{!! $renting->vehicle_id !!}</td>
                            <td>{!! $renting->start_date !!}</td>
                            <td>{!! $renting->end_date !!}</td>
                            <td>100000</td>
                            <td>{!! $renting->created_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
