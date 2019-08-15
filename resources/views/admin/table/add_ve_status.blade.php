@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 style="text-align: center"><strong>{{ trans('messages.vehicle status info') }}</strong></h2>
        <a class="btn btn-info" href="{!! route('homeVe_status') !!}">{{ trans('messages.back') }}</a>
        <form class="form-horizontal" method="POST" action="{{ route('storeVe_status') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ trans('messages.name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required>
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
