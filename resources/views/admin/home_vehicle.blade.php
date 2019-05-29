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
                    <a href="{{ route('home_renting')}}" class="list-group-item" id="renting">Renting</a>
                    <a href="{{ route('home_user')}}" class="list-group-item" id="user">User</a>
                    <a href="{{ route('home_vehicle')}}" class="list-group-item" id="vehicle">Vehicle</a>
                </div>
            </div>
            <div class="col-lg-9">
                <table class="table" id="tb_vehicles">
                    <br>
                    <a class="btn btn-info" href="">Add Vehicle</a>
                    <br>
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Number plate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Color</th>
                        <th scope="col">Content</th>
                        <th scope="col">Ve_Status</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <th scope="row">{!! $vehicle -> id !!}</th>
                            <td>{!! $vehicle -> name !!}</td>
                            <td>{!! $vehicle -> type_id !!}</td>
                            <td>{!! $vehicle -> brand_id !!}</td>
                            <td>{!! $vehicle -> number_plate !!}</td>
                            <td>{!! $vehicle -> status_id !!}</td>
                            <td>{!! $vehicle -> color_id !!}</td>
                            <td>{!! $vehicle -> content !!}</td>
                            <td>{!! $vehicle -> ve_status_id !!}</td>
                            <td>{!! $vehicle -> price !!}</td>
                            <td>
                                <a class="btn btn-info" href="">Edit</a>
                                <form action="" method="post">
                                    <input type="hidden" name="student_id" value="">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input type="submit" value="Delete" class="btn btn-danger">
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

