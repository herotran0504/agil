@extends('SuperAdmin.layout')
@section('title')
    Merchants
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
            <div class="card website-settings-card shadow mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab"
                            aria-controls="pills-posts"><i class="fa fa-pencil"></i> List of Merchants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-addpost-tab" data-toggle="pill" href="#pills-addpost" role="tab"
                            aria-controls="pills-addpost"><i class="fa fa-plus"></i> New Merchant</a>
                    </li>
                </ul>
                <div class="row tab-content mt-2" id="pills-tabContent">
                    <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                        id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Business</th>
                                    <th class="text-center">Dates</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merchants as $merchant)
                                    <tr>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $merchant->f_name_ar.' '.$merchant->m_name_ar.' '.$merchant->l_name_ar }}
                                            <br>
                                            {{ $merchant->f_name_en.' '.$merchant->m_name_en.' '.$merchant->l_name_en }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $merchant->phone }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $merchant->business_name }} <br> {{ $merchant->commercial_registratio_n }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $merchant->created_at }} <br> {{ $merchant->updated_at }}
                                        </th>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="{{ route('ad_branch_index', ['merchant' => $merchant->id]) }}"
                                                class="btn btn-info btn-sm">Branches</a>
                                            <a href="{{ route('ad_merchant_edit', ['id' => $merchant->id]) }}"
                                                class="btn btn-primary btn-sm">Edit Merchant</a>
                                            <a href="{{ route('ad_merchant_delete', ['id' => $merchant->id]) }}"
                                                class="btn btn-danger btn-sm">Delete Merchant</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpost" role="tabpanel"
                        aria-labelledby="pills-addpost-tab">
                        <form action="{{ route('ad_merchant_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">First Name</label>
                                        <input type="text" name="f_name_en"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Middle Name</label>
                                        <input type="text" name="m_name_en" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Last Name</label>
                                        <input type="text" name="l_name_en" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">First Name (AR)</label>
                                        <input type="text" name="f_name_ar"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Middle Name (AR)</label>
                                        <input type="text" name="m_name_ar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Last Name (AR)</label>
                                        <input type="text" name="l_name_ar" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="home-page-label">Business Name</label>
                                <input type="text" name="business_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="home-page-label">Commercial Registratio</label>
                                <input type="text" name="commercial_registratio_n" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
