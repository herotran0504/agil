@extends('SuperAdmin.layout')
@section('title')
Edit Device
@endsection
@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Device : {{ $device->username }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider mb-3" href="{{ route('ad_pos_index') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Devices List
                </a>
                <form action="{{ route('ad_pos_update', ['id'=>$device->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ControlSelect1">Branch</label>
                        <select name="branch_id" class="form-control" id="ControlSelect1">
                            @foreach($branches as $branch)
                                <option @if($branch->id == $device->branch_id) selected @endif value="{{ $branch->id }}">{{ $branch->name_en.'-'.$branch->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">Username</label>
                                <input type="text" name="username" value="{{ $device->name_en }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">Password</label>
                                <input type="text" name="password" value="{{ $device->name_ar }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
