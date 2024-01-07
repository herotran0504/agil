@extends('SuperAdmin.layout')
@section('title')
Edit Branch
@endsection
@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Branch : {{ $branch->name_en }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider mb-3" href="{{ route('ad_branch_index') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Branches List
                </a>
                <form action="{{ route('ad_branch_update', ['id'=>$branch->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ControlSelect1">Merchant</label>
                        <select name="merchant_id" class="form-control" id="ControlSelect1">
                            @foreach($merchants as $merchant)
                                <option @if($merchant->id == $branch->merchant_id) selected @endif value="{{ $merchant->id }}">{{ $merchant->business_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row d-flex">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">Name</label>
                                <input type="text" name="name_en" value="{{ $branch->name_en }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="home-page-label">Name (AR)</label>
                                <input type="text" name="name_ar" value="{{ $branch->name_ar }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ControlSelect2">is Main?</label>
                        <select name="is_main" class="form-control" id="ControlSelect2">
                            <option @if($branch->is_main == 0) selected @endif value="0">No</option>
                            <option @if($branch->is_main == 1) selected @endif value="1">Yes</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
