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
                    <a href="{{ route('homeRenting')}}" class="list-group-item">{{ trans('messages.renting') }}</a>
                    <a href="{{ route('homeUser')}}" class="list-group-item">{{ trans('messages.user') }}</a>
                    <a href="{{ route('homeVehicle')}}" class="list-group-item">{{ trans('messages.vehicle') }}</a>
                    <div class="list-group-item">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown">{{ trans('messages.table management') }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('homeBrand') }}">{{ trans('messages.brand table') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('homeType') }}">{{ trans('messages.type table') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('homeColor') }}">{{ trans('messages.color table') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('homeStatus') }}">{{ trans('messages.status table') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('homeVe_status') }}">{{ trans('messages.ve_status table') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('homeRole') }}">{{ trans('messages.role table') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <h2 style="text-align: center"><strong>{{ trans('messages.renting info') }}</strong></h2>
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
