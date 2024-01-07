@extends('SuperAdmin.layout')
@section('title')
Admins
@endsection
@section('content')
@if(Session::has('success'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(Session::has('danger'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(count($errors) > 0)
<div class="row">
    <div class="col-10 offset-1">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="row">
                        <div class="change-admin col-lg-5 col-md-12 col-sm-12 ml-4">
                            <form method="POST" action="{{ route('ad_update.admin.password') }}">
                                @csrf
                                <div class="form-group">
                                    <b><label class="row home-page-label">Change Your Credentials</label></b>
                                    <label>Change Email</label>
                                    <input name="new_email" type="text" value="{{ $admin->email }}" class="form-control">
                                    <label>Current Password</label>
                                    <input name="current_password" type="password" class="form-control">
                                    <label>New Password</label>
                                    <input name="new_password" type="password" class="form-control">
                                    <label>Repeat New Password</label>
                                    <input name="confirm_password" type="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12  ml-4 mr-4">
                            <form method="POST" action="{{ route('ad_add.admin') }}">
                                @csrf
                                <div class="form-group">
                                    <b><label class="row home-page-label">Add New Admin Account</label></b>
                                    <label>Username</label>
                                    <input placeholder="Enter a username .." name="name" type="text" class="form-control">
                                    <label>Email Address</label>
                                    <input placeholder="Enter a valid Email .." name="email" type="email" class="form-control">
                                    <label>Password</label>
                                    <input placeholder="Choose a strong password" name="password" type="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Admin</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                        <div class="col-lg-10 offset-1 col-md-12 col-sm-12">
                            <b><label class="row home-page-label">Manage Admins List</label></b>
                            <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Admins Email</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $user)
                            <tr>
                                <th class="text-center">{{ $user->email }}</th>
                                <td class="text-center">
                                    <a href="{{ route('ad_delete.admin', ['id'=>$user->id]) }}" class="btn btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
