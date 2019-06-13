@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <input type="search" name="search">
        <input class="btn btn-success" type="submit" value="{{ trans('messages.search') }}">
    </div>
    <br>
    <div class="container">
        @if (session('mess_del_vehicle'))
            <p class="allert alert-success">{{ session('mess_del_vehicle') }}</p>
        @endif
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
                <table class="table" id="tb_vehicles">
                    <a class="btn btn-info" href="{!! route('createVehicle') !!}">{{ trans('messages.add vehicle') }}</a>
                    <thead>
                    <tr>
                        <th scope="col">{{ trans('messages.id') }}</th>
                        <th scope="col">{{ trans('messages.vehicle name') }}</th>
                        <th scope="col">{{ trans('messages.vehicle type') }}</th>
                        <th scope="col">{{ trans('messages.vehicle brand') }}</th>
                        <th scope="col">{{ trans('messages.color') }}</th>
                        <th scope="col">{{ trans('messages.ve_status') }}</th>
                        <th scope="col">{{ trans('messages.price') }}</th>
                        <th scope="col">{{ trans('messages.status') }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <th scope="row">{!! $vehicle->id !!}</th>
                            <td>{!! $vehicle->name !!}</td>
                            <td>{!! $vehicle->type_id !!}</td>
                            <td>{!! $vehicle->brand_id !!}</td>
                            <td>{!! $vehicle->color_id !!}</td>
                            <td>{!! $vehicle->ve_status_id !!}</td>
                            <td>{!! $vehicle->price !!}</td>
                            <td>{!! $vehicle->status_id !!}</td>
                            <td>
                                <a class="btn btn-info" href="{!! route('editVehicle',$vehicle->id) !!}">{{ trans('messages.edit') }}</a>
                                <form action="{!! route('deleteVehicle') !!}" method="post">
                                    <input type="hidden" name="vehicle_id" value="{!! $vehicle->id !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
