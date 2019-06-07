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
                <h3 class="my-4">{{ trans('messages.menu admin') }}</h3>
                <div class="list-group">
                    <a href="javascript:;" class="list-group-item" id="renting">Renting</a>
                    <a href="javascript:;" class="list-group-item" id="user">User</a>
                    <a href="javascript:;" class="list-group-item" id="vehicle">Vehicle</a>
                </div>
            </div>
            <div id="showdata">
                <div class="col-lg-9">
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Vehicle ID</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rentings as $renting)
                            <tr>
                                <th scope="row">{!! $renting->id !!}</th>
                                <td>{!! $renting->user_id !!}</td>
                                <td>{!! $renting->vehicle_id !!}</td>
                                <td>{!! $renting->start_date !!}</td>
                                <td>{!! $renting->end_date !!}</td>
                                <td>100000</td>
                                <td>{!! $renting->created_at !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.col-lg-9').click(function () {
                var id_list = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "admin/ajax",
                    data: {id: id_list},
                    dataType: "html",
                    success: function (data) {
                    }
                }).done(function (data) {
                    $('#showdata').html(data);
                });
            });
        })
    </script>
@endsection
