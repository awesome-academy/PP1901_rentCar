@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-info" href="{!! route('home_user') !!}">{{ trans('messages.back') }}</a>
        <form class="form-horizontal" method="POST" action="{{ route('updateUser',$users->id) }}">
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
                    <input id="name" type="text" class="form-control" name="name"
                           value="{!! $users->name !!}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                <label for="birthday"
                       class="col-md-4 control-label">{{ trans('messages.birthday') }}</label>

                <div class="col-md-6">
                    <input id="birthday" type="date" class="form-control" name="birthday"
                           value="{!! $users->birthday !!}" required autofocus>

                    @if ($errors->has('birthday'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{ trans('messages.email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{!! $users->email !!}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address"
                       class="col-md-4 control-label">{{ trans('messages.address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address"
                           value="{!! $users->address !!}" required autofocus>

                    @if ($errors->has('address'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">{{ trans('messages.phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone"
                           value="{!! $users->phone !!}" required autofocus>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
                <label for="card_id"
                       class="col-md-4 control-label">{{ trans('messages.card id') }}</label>

                <div class="col-md-6">
                    <input id="card_id" type="text" class="form-control" name="card_id"
                           value="{!! $users->card_id !!}" required autofocus>

                    @if ($errors->has('card_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('card_id') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                <label for="role_id"
                       class="col-md-4 control-label">{{ trans('messages.role') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="role_id" name="role_id">
                        @foreach($roles as $role)
                            <option value="{!! $role->id !!}">{!! $role->name !!}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                    @endif
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