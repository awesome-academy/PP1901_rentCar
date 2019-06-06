<table class="table">
    <br>
    <a class="btn btn-info" href="">Add User</a>
    <br>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role_id</th>
        <th scope="col">Created_at</th>
        <th scope="col">Update_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{!! $user->id !!}</th>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->role_id !!}</td>
            <td>{!! $user->created_at !!}</td>
            <td>{!! $user->updated_at !!}</td>
            <td>
                <a class="btn btn-info" href="">Edit</a>
                <form action="" method="post">
                    <input type="hidden" name="student_id" value="">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>