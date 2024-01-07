@extends('SuperAdmin.layout')
@section('title')
Edit Merchant
@endsection
@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Merchant : {{ $merchant->business_name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider mb-3" href="{{ route('ad_merchant_index') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Merchant List
                </a>
                <form action="{{ route('ad_merchant_update', ['id'=>$merchant->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">First Name</label>
                                <input type="text" name="f_name_en" value="{{ $merchant->f_name_en }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Middle Name</label>
                                <input type="text" name="m_name_en" value="{{ $merchant->m_name_en }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Last Name</label>
                                <input type="text" name="l_name_en" value="{{ $merchant->l_name_en }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">First Name (AR)</label>
                                <input type="text" name="f_name_ar" value="{{ $merchant->f_name_ar }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Middle Name (AR)</label>
                                <input type="text" name="m_name_ar" value="{{ $merchant->m_name_ar }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Last Name (AR)</label>
                                <input type="text" name="l_name_ar" value="{{ $merchant->l_name_ar }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Phone</label>
                        <input type="text" name="phone" value="{{ $merchant->phone }}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="home-page-label">Business Name</label>
                        <input type="text" name="business_name" value="{{ $merchant->business_name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Commercial Registratio</label>
                        <input type="text" name="commercial_registratio_n" value="{{ $merchant->commercial_registratio_n }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
