@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! URL::previous() !!}">{{ trans('messages.back') }}</a>
        <br>
        <form method="get" action="{!! route('confirm') !!}">
            <h2 style="text-align: center"><strong>{{ trans('messages.user info') }}</strong></h2>
            <div class="form-group">
                <label for="name">{{ trans('messages.name') }} : </label> {!! $user['name'] !!} <br>
                <label for="birthday">{{ trans('messages.birthday') }} :</label> {!! $user['birthday'] !!} <br>
                <label for="email">{{ trans('messages.email') }} :</label> {!! $user['email'] !!} <br>
                <label for="address">{{ trans('messages.address') }} :</label> {!! $user['address'] !!} <br>
                <label for="phone">{{ trans('messages.phone') }} :</label> {!! $user['phone'] !!} <br>
                <label for="card_id">{{ trans('messages.card id') }} :</label> {!! $user['card_id'] !!}
            </div>
            <table class="table">
                <h2 style="text-align: center"><strong>{{ trans('messages.renting info') }}</strong></h2>
                <thead>
                <tr>
                    <th scope="col">{{ trans('messages.id') }}</th>
                    <th scope="col">{{ trans('messages.vehicle name') }}</th>
                    <th scope="col">{{ trans('messages.vehicle type') }}</th>
                    <th scope="col">{{ trans('messages.color') }}</th>
                    <th scope="col">{{ trans('messages.ve_status') }}</th>
                    <th scope="col">{{ trans('messages.start date') }}</th>
                    <th scope="col">{{ trans('messages.end date') }}</th>
                    <th scope="col">{{ trans('messages.price') }}</th>
                    <th scope="col">{{ trans('messages.money') }}</th>
                </tr>
                </thead>
                <tbody>
                @php($total = 0)
                @foreach($carts as $cart)
                    <tr>
                        <th scope="row">{!! $cart['id'] !!}</th>
                        <td>{!! $cart['name'] !!}</td>
                        <td>{!! $cart['type'] !!}</td>
                        <td>{!! $cart['color'] !!}</td>
                        <td>{!! $cart['ve_status'] !!}</td>
                        <td>{!! $cart['startdate']  !!}</td>
                        <td>{!! $cart['enddate']  !!}</td>
                        <td>{!! $cart['price'] !!} VND</td>
                        <td>{!! $cart['total'] !!} VND</td>
                    </tr>
                    @php($total += $cart['total'])
                @endforeach
                </tbody>
            </table>
        </form>
        <h3><strong>{{ trans('messages.total') }}: </strong>{{ $total }} VND</h3>
        <br>
        <a class="btn btn-info" href="{!! route('storeCart') !!}">{{ trans('messages.confirm renting') }}</a>
    </div>
@endsection
