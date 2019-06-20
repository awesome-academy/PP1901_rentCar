@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 style="text-align: center"><strong>{{ trans('messages.role info') }}</strong></h2>
        <a class="btn btn-info" href="{!! route('homeRole') !!}">{{ trans('messages.back') }}</a>
        <form class="form-horizontal" method="POST" action="{{ route('updateRole',$roles->id) }}">
            {{ csrf_field() }}
            <br>
            <div>
                @if(Session::has('mess'))
                    <p class="alert alert-success">{!! session('mess') !!}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ trans('messages.name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{!! $roles->name !!}"
                           required>
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
