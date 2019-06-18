@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 style="text-align: center"><strong>{{ trans('messages.vehicle info') }}</strong></h2>
        <a class="btn btn-info" href="{!! route('homeVehicle') !!}">{{ trans('messages.back') }}</a>
        <form class="form-horizontal" method="POST" action="{{ route('storeVehicle') }}">
            {{ csrf_field() }}
            <br>
            <div>
                @if(isset($mess))
                    <p class="alert alert-success">{!! $mess !!}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ trans('messages.name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required>
                </div>
            </div>

            <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                <label for="type_id" class="col-md-4 control-label">{{ trans('messages.vehicle type') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="type_id" name="type_id">
                        @foreach($types as $type)
                            <option value="{!! $type->id !!}">{!! $type->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                <label for="brand_id" class="col-md-4 control-label">{{ trans('messages.vehicle brand') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="brand_id" name="brand_id">
                        @foreach($brands as $brand)
                            <option value="{!! $brand->id !!}">{!! $brand->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('number_plate') ? ' has-error' : '' }}">
                <label for="number_plate" class="col-md-4 control-label">{{ trans('messages.number plate') }}</label>

                <div class="col-md-6">
                    <input id="number_plate" type="text" class="form-control" name="number_plate" required>
                </div>
            </div>

            <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                <label for="color_id"
                       class="col-md-4 control-label">{{ trans('messages.color') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="color_id" name="color_id">
                        @foreach($colors as $color)
                            <option value="{!! $color->id !!}">{!! $color->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                <label for="content" class="col-md-4 control-label">{{ trans('messages.content') }}</label>

                <div class="col-md-6">
                    <input id="content" type="text" class="form-control" name="content" value="" required>
                </div>
            </div>

            <div class="form-group{{ $errors->has('ve_status_id') ? ' has-error' : '' }}">
                <label for="ve_status_id"
                       class="col-md-4 control-label">{{ trans('messages.ve_status') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="ve_status_id" name="ve_status_id">
                        @foreach($ve_statuses as $ve_status)
                            <option value="{!! $ve_status->id !!}">{!! $ve_status->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price"
                       class="col-md-4 control-label">{{ trans('messages.price') }}</label>

                <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="price" required>
                </div>
            </div>

            <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                <label for="status_id"
                       class="col-md-4 control-label">{{ trans('messages.status') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="status_id" name="status_id">
                        @foreach($statuses as $status)
                            <option value="{!! $status->id !!}">{!! $status->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('messages.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection