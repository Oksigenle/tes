@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
            <h2>{{$user->name}}</h2>
            Email : {{$user->email}} <br>
            Phone : {{$user->phone}} <br>
            TGL : {{$user->tanggal_lahir}} <br>
            Agama : {{$user->agama}}
<br><br><br><br>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label><br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
            <br><a href="change-password" class="pull-right btn btn-sm btn-primary">Ubah Password</a>
            <a href="biodata" class="pull-right btn btn-sm btn-primary">Update Profile</a>

        </div>
    </div>
</div>
@endsection
