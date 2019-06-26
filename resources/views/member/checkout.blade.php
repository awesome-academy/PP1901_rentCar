@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! route('welcome') !!}">{{ trans('messages.back') }}</a>
        <br>
        <div class="col-lg-9">
            <table class="table">
                <h2 style="text-align: center"><strong>{{ trans('messages.checkout info') }}</strong></h2>
                <thead>
                <tr>
                    <th scope="col">{{ trans('messages.id') }}</th>
                    <th scope="col">{{ trans('messages.vehicle name') }}</th>
                    <th scope="col">{{ trans('messages.vehicle type') }}</th>
                    <th scope="col">{{ trans('messages.color') }}</th>
                    <th scope="col">{{ trans('messages.ve_status') }}</th>
                    <th scope="col">{{ trans('messages.price') }}</th>
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
                        <td>{!! $cart['price'] !!} VND</td>
                        <td>
                            <form action="{!! route('deleteCart') !!}" method="post">
                                <input type="hidden" name="cart_id" value="{!! $cart['id'] !!}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <input type="submit" value="{{ trans('messages.delete') }}" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @php($total += $cart['price'])
                @endforeach
                </tbody>
            </table>
            <h3><strong>{{ trans('messages.total') }}: </strong>{{ $total }} VND</h3>
            <br>
            <form action="" method="post">
                <input type="hidden" name="confirm" value="">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="submit" value="{{ trans('messages.confirm') }}" class="btn btn-info">
            </form>
        </div>
    </div>
@endsection
