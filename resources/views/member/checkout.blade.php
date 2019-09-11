@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! URL::previous() !!}">{{ trans('messages.back') }}</a>
        <br><br>
        @if (Session::has('message1'))
            <div class="alert alert-info">{{ Session::get('message1') }}</div>
        @endif
        @if (Session::has('message2'))
            <div class="alert alert-info">{{ Session::get('message2') }}</div>
        @endif
        <form method="post" action="{!! route('caculator') !!}">
            <table class="table">
                <h2 style="text-align: center"><strong>{{ trans('messages.checkout info') }}</strong></h2>
                <thead>
                <tr>
                    <th scope="col">{{ trans('messages.id') }}</th>
                    <th scope="col">{{ trans('messages.vehicle name') }}</th>
                    <th scope="col">{{ trans('messages.start date') }}</th>
                    <th scope="col">{{ trans('messages.end date') }}</th>
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
                        <td><a href="{!! route('vehicleDetail', $cart['id']) !!}">{!! $cart['name'] !!}</a></td>
                        <td>@if(isset($cart['startdata']))
                                <strong>{{ trans('messages.booked') }}</strong>
                                @foreach($cart['startdata'] as $startdata)
                                    <li>{{ $startdata }}</li>
                                @endforeach
                            @else
                                <p>{{ trans('messages.no book') }}</p>
                            @endif </td>

                        <td>@if(isset($cart['enddata']))
                                <strong>{{ trans('messages.booked') }}</strong>
                                @foreach($cart['enddata'] as $enddata)
                                    <li>{{ $enddata }}</li>
                                @endforeach
                            @else
                                <p>{{ trans('messages.no book') }}</p>
                            @endif </td>
                        </td>
                        <td>
                            <strong>{{ trans('messages.select') }}</strong>
                            <input type="date" id="calendar" class="form-control" value="{{ $cart['startdate'] }}"
                                   name="start_date_{!! $cart['id'] !!}">
                        </td>
                        <td>
                            <strong>{{ trans('messages.select') }}</strong>
                            <input type="date" id="calendar" class="form-control" value="{{ $cart['enddate'] }}"
                                   name="end_date_{!! $cart['id'] !!}">
                        </td>
                        <td>{!! $cart['price'] !!} VND</td>
                        <td>{!! $cart['total'] !!} VND</td>
                        <td>
                            <a href="javascript:;" class="btn btn-danger deleteCart"
                               id="{!! $cart['id'] !!}">{!! trans('messages.delete') !!}</a>
                        </td>
                    </tr>
                    @php($total += $cart['total'])
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="submit" value="{{ trans('messages.save') }}" class="btn btn-info">
        </form>
        <h3><strong>{{ trans('messages.total') }}: </strong>{{ $total }} VND</h3>
        <a class="btn btn-info" href="{!! route('confirm') !!}">{{ trans('messages.confirm') }}</a>
    </div>

    <script>
        $(document).ready(function () {
            $('.deleteCart').click(function () {
                var id_cart = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "/checkout/delete/" + id_cart,
                    data: {
                        "id": id_cart,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "html",
                    success: function () {
                        window.location.reload();
                    }
                });
            });
        })

        var today = new Date().toISOString().split('T')[0];
        document.getElementById("calendar").setAttribute('min', today);
    </script>
@endsection
