@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-info" href="{!! URL::previous() !!}">{{ trans('messages.back') }}</a>
        <br>
        <h2 style="text-align: center"><strong>{{ trans('messages.vehicle info') }}</strong></h2>
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="col-md-4">
                <img class="image"
                     src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg">
            </div>
            <div class="col-md-8">
                <label for="name">{{ trans('messages.name') }} : </label> {!! $vehicles['name'] !!} <br>
                <label for="birthday">{{ trans('messages.vehicle type') }} :</label> {!! $vehicles['type']['name'] !!}
                <br>
                <label for="email">{{ trans('messages.vehicle brand') }} :</label> {!! $vehicles['brand']['name'] !!}
                <br>
                <label for="address">{{ trans('messages.number plate') }} :</label> {!! $vehicles['number_plate'] !!}
                <br>
                <label for="card_id">{{ trans('messages.color') }} :</label> {!! $vehicles['color']['name'] !!} <br>
                <label for="card_id">{{ trans('messages.content') }} :</label> {!! $vehicles['content'] !!} <br>
                <label for="card_id">{{ trans('messages.ve_status') }} :</label> {!! $vehicles['ve_status']['name'] !!}
                <br>
                <label for="card_id">{{ trans('messages.price') }} :</label> {!! $vehicles['price'] !!} VND <br>
                <label for="phone">{{ trans('messages.status') }} :</label> {!! $vehicles['status']['name'] !!} <br>
                <label for="phone">{{ trans('messages.rating') }} :
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;
                    </small>
                    <br>
                    <form action="{!! route('addCart') !!}" method="post">
                        <input type="hidden" name="vehicle_id" value="{!! $vehicles['id'] !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="submit" value="{{ trans('messages.book') }}"
                               class="btn btn-info">
                    </form>
            </div>
        </div>
@endsection
