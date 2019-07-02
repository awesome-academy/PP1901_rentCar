@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <a class="btn btn-info" href="{!! route('welcome') !!}">{{ trans('messages.back') }}</a>
        <br>
        <form method="post" action="{!! route('caculator') !!}">
            <table class="table">
                <h2 style="text-align: center"><strong>{{ trans('messages.checkout info') }}</strong></h2>
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
                    <th scope="col">{{ trans('messages.total') }}</th>
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
                        <td><input type="date" class="form-control" value="{{ $cart['startdate'] }}"
                                   name="start_date_{!! $cart['id'] !!}"></td>
                        <td><input type="date" class="form-control" value="{{ $cart['enddate'] }}"
                                   name="end_date_{!! $cart['id'] !!}"></td>
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
        <form action="" method="post">
            <input type="submit" value="{{ trans('messages.confirm') }}" class="btn btn-info">
        </form>
    </div>
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
    </script>
@endsection
