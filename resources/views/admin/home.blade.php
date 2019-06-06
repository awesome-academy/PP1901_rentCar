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
                        <a href="#" class="list-group-item">Renting</a>
                        <a href="#" class="list-group-item">User</a>
                        <a href="#" class="list-group-item">Vehicles</a>
                </div>
            </div>
            <div class="col-lg-9">
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Vehicle ID</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Created at</th>
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
                <br>
                <table class="table">
                    <br>
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
                        <th scope="row">{!! $user->id !!}</th>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->role_id !!}</td>
                        <td>{!! $user->created_at !!}</td>
                        <td>{!! $user->updated_at !!}</td>
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
    </div>
@endsection
