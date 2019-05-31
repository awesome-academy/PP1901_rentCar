@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <input type="search" name="search">
        <input class="btn btn-success" type="submit" value="{{ trans('messages.search') }}">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h3 class="my-4">{{ trans('messages.menu') }}</h3>
                <div class="list-group">
                    @foreach($type as $types)
                    <a href="#" class="list-group-item">{!! $types->name !!}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div id="card" class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                             alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">Item One</a>
                                </h4>
                                <h5><strong>{{ trans('messages.price') }}: </strong>100000/1h</h5>
                                <h5><strong>{{ trans('messages.ve_status') }}: </strong>Mua dưới 3 tháng</h5>
                                <h5><strong>{{ trans('messages.status') }}: </strong>Còn xe</h5>
                                <h5><strong>{{ trans('messages.rating') }}:
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
                                <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="card" class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                             alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">Item Two</a>
                                </h4>
                                <h5><strong>{{ trans('messages.price') }}: </strong>100000/1h</h5>
                                <h5><strong>{{ trans('messages.ve_status') }}: </strong>Mua dưới 3 tháng</h5>
                                <h5><strong>{{ trans('messages.status') }}: </strong>Còn xe</h5>
                                <h5><strong>{{ trans('messages.rating') }}:
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
                                <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="card" class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                             alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">Item Three</a>
                                </h4>
                                <h5><strong>{{ trans('messages.price') }}: </strong>100000/1h</h5>
                                <h5><strong>{{ trans('messages.ve_status') }}: </strong>Mua dưới 3 tháng</h5>
                                <h5><strong>{{ trans('messages.status') }}: </strong>Còn xe</h5>
                                <h5><strong>{{ trans('messages.rating') }}:
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
                                <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="card" class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                             alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">Item Four</a>
                                </h4>
                                <h5><strong>{{ trans('messages.price') }}: </strong>100000/1h</h5>
                                <h5><strong>{{ trans('messages.ve_status') }}: </strong>Mua dưới 3 tháng</h5>
                                <h5><strong>{{ trans('messages.status') }}: </strong>Còn xe</h5>
                                <h5><strong>{{ trans('messages.rating') }}:
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
                                <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="card" class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                             alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">Item Five</a>
                                </h4>
                                <h5><strong>{{ trans('messages.price') }}: </strong>100000/1h</h5>
                                <h5><strong>{{ trans('messages.ve_status') }}: </strong>Mua dưới 3 tháng</h5>
                                <h5><strong>{{ trans('messages.status') }}: </strong>Còn xe</h5>
                                <h5><strong>{{ trans('messages.rating') }}:
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
                                <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="card" class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                             alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">Item Six</a>
                                </h4>
                                <h5><strong>{{ trans('messages.price') }}: </strong>100000/1h</h5>
                                <h5><strong>{{ trans('messages.ve_status') }}: </strong>Mua dưới 3 tháng</h5>
                                <h5><strong>{{ trans('messages.status') }}: </strong>Còn xe</h5>
                                <h5><strong>{{ trans('messages.rating') }}:
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
                                <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
