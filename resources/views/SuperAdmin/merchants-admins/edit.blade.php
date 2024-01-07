@extends('SuperAdmin.layout')
@section('title')
Edit Merchant Admin
@endsection
@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Merchant : {{ $merchant_admin->business_name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider mb-3" href="{{ route('ad_merchant_admins_index') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Merchants Admins
                </a>
                <form action="{{ route('ad_merchant_admins_update', ['id'=>$merchant_admin->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ControlSelect1">Merchant</label>
                        <select name="merchant_id" class="form-control" id="ControlSelect1">
                            @foreach($merchants as $merchant)
                                <option @if($merchant->id == $merchant_admin->merchant_id) selected @endif value="{{ $merchant->id }}">{{ $merchant->business_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">First Name</label>
                                <input type="text" name="f_name_en" value="{{ $merchant_admin->f_name_en }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Middle Name</label>
                                <input type="text" name="m_name_en" value="{{ $merchant_admin->m_name_en }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Last Name</label>
                                <input type="text" name="l_name_en" value="{{ $merchant_admin->l_name_en }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">First Name (AR)</label>
                                <input type="text" name="f_name_ar" value="{{ $merchant_admin->f_name_ar }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Middle Name (AR)</label>
                                <input type="text" name="m_name_ar" value="{{ $merchant_admin->m_name_ar }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Last Name (AR)</label>
                                <input type="text" name="l_name_ar" value="{{ $merchant_admin->l_name_ar }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Name</label>
                        <input type="text" name="name" value="{{ $merchant_admin->name }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Email</label>
                        <input type="text" name="email" value="{{ $merchant_admin->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">new Password</label>
                        <input type="text" name="password" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Phone</label>
                        <input type="text" name="phone" value="{{ $merchant_admin->phone }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Role</label>
                        <input type="text" name="role" value="{{ $merchant_admin->role }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
