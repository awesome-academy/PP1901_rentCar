@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <input type="search" name="search">
        <input class="btn btn-success" type="submit" value="{{ trans('messages.search') }}">
    </div>
    <br>
    <div class="container">
        @if (session('mess_del_user'))
            <p class="allert alert-success">{{ session('mess_del_user') }}</p>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <h3 class="my-4">{{ trans('messages.menu admin') }}</h3>
                <div class="list-group">
                    <a href="{{ route('home_renting')}}" class="list-group-item">{{ trans('messages.renting') }}</a>
                    <a href="{{ route('home_user')}}" class="list-group-item">{{ trans('messages.user') }}</a>
                    <a href="{{ route('home_vehicle')}}" class="list-group-item">{{ trans('messages.vehicle') }}</a>
                    <div class="list-group-item">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown">{{ trans('messages.table management') }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">{{ trans('messages.brand table') }}</a>
                            </li>
                            <li>
                                <a href="">{{ trans('messages.type table') }}</a>
                            </li>
                            <li>
                                <a href="">{{ trans('messages.color table') }}</a>
                            </li>
                            <li>
                                <a href="">{{ trans('messages.status table') }}</a>
                            </li>
                            <li>
                                <a href="">{{ trans('messages.ve_status table') }}</a>
                            </li>
                            <li>
                                <a href="">{{ trans('messages.role table') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <br>
                <table class="table" id="tb_users">
                    <thead>
                    <tr>
                        <th scope="col">{{ trans('messages.id') }}</th>
                        <th scope="col">{{ trans('messages.user name') }}</th>
                        <th scope="col">{{ trans('messages.email') }}</th>
                        <th scope="col">{{ trans('messages.role') }}</th>
                        <th scope="col">{{ trans('messages.created at') }}</th>
                        <th scope="col">{{ trans('messages.updated at') }}</th>
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
                                <a class="btn btn-info"
                                   href="{!! route('editUser',$user->id) !!}">{{ trans('messages.edit') }}</a>
                                <form action="{!! route('deleteUser') !!}" method="post">
                                    <input type="hidden" name="user_id" value="{!! $user->id !!}">
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
