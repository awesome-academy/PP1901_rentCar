@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! route('welcome') !!}">{{ trans('messages.back') }}</a>
        @if (session('mess_del_brand'))
            <p class="allert alert-success">{{ session('mess_del_brand') }}</p>
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
                    <h2 style="text-align: center"><strong>{{ trans('messages.brand info') }}</strong></h2>
                    <a class="btn btn-info"
                       href="{!! route('createBrand') !!}">{{ trans('messages.add') }}
                    </a>
                    <thead>
                    <tr>
                        <th scope="col">{{ trans('messages.id') }}</th>
                        <th scope="col">{{ trans('messages.name') }}</th>
                        <th scope="col">{{ trans('messages.created at') }}</th>
                        <th scope="col">{{ trans('messages.updated at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <th scope="row">{!! $brand->id !!}</th>
                            <td>{!! $brand->name !!}</td>
                            <td>{!! $brand->created_at !!}</td>
                            <td>{!! $brand->updated_at !!}</td>
                            <td>
                                <a class="btn btn-info"
                                   href="{!! route('editBrand',$brand->id) !!}">{{ trans('messages.edit') }}</a>
                                <form action="{!! route('deleteBrand') !!}" method="post">
                                    <input type="hidden" name="brand_id" value="{!! $brand->id !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $brands->links() }}
            </div>
        </div>
    </div>
@endsection
