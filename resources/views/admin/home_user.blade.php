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
                <br>
                <table class="table" id="tb_users">
                    <a class="btn btn-info" href="">Add User</a>
                    <br>
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role_id</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Update_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{!! $user -> id !!}</th>
                            <td>{!! $user -> name !!}</td>
                            <td>{!! $user -> email !!}</td>
                            <td>{!! $user -> role_id !!}</td>
                            <td>{!! $user -> created_at !!}</td>
                            <td>{!! $user -> updated_at !!}</td>
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
