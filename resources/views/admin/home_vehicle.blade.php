@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        @if (session('mess_del_vehicle'))
            <p class="allert alert-success">{{ session('mess_del_vehicle') }}</p>
        @endif
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
                    <h2 style="text-align: center"><strong>{{ trans('messages.vehicle info') }}</strong></h2>
                    <a class="btn btn-info"
                       href="{!! route('createVehicle') !!}">{{ trans('messages.add') }}
                    </a>
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
                            <th scope="row">{!! $vehicle['id'] !!}</th>
                            <td>{!! $vehicle['name'] !!}</td>
                            <td>{!! $vehicle['type']['name'] !!}</td>
                            <td>{!! $vehicle['brand']['name'] !!}</td>
                            <td>{!! $vehicle['color']['name'] !!}</td>
                            <td>{!! $vehicle['ve_status']['name'] !!}</td>
                            <td>{!! $vehicle['price'] !!}</td>
                            <td>{!! $vehicle['status']['name'] !!}</td>
                            <td>
                                <a class="btn btn-info"
                                   href="{!! route('editVehicle',$vehicle['id']) !!}">{{ trans('messages.edit') }}</a>
                                <form action="{!! route('deleteVehicle') !!}" method="post">
                                    <input type="hidden" name="vehicle_id" value="{!! $vehicle['id'] !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $vehicles->links() }}
            </div>
        </div>
    </div>
@endsection
