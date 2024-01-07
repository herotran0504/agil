@extends('SuperAdmin.layout')
@section('title')
    Branches
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
            <div class="card website-settings-card shadow mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab"
                            aria-controls="pills-posts"><i class="fa fa-pencil"></i> List of Branches @if($merchantName)({{ $merchantName }}) @endif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-addpost-tab" data-toggle="pill" href="#pills-addpost" role="tab"
                            aria-controls="pills-addpost"><i class="fa fa-plus"></i> New Branch</a>
                    </li>
                </ul>
                <div class="row tab-content mt-2" id="pills-tabContent">
                    <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                        id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">is Main?</th>
                                    <th class="text-center">Business</th>
                                    <th class="text-center">Dates</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $branch->name_ar}}
                                            <br>
                                            {{ $branch->name_en}}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $branch->is_main == 1?'yes':'no' }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $branch->merchant->business_name }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $branch->created_at }} <br> {{ $branch->updated_at }}
                                        </th>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="{{ route('ad_pos_index', ['branch' => $branch->id]) }}"
                                                class="btn btn-info btn-sm">Devices</a>
                                            <a href="{{ route('ad_branch_edit', ['id' => $branch->id]) }}"
                                                class="btn btn-primary btn-sm">Edit Branch</a>
                                            <a href="{{ route('ad_branch_delete', ['id' => $branch->id]) }}"
                                                class="btn btn-danger btn-sm">Delete Branch</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpost" role="tabpanel"
                        aria-labelledby="pills-addpost-tab">
                        <form action="{{ route('ad_branch_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="ControlSelect1">Merchant</label>
                                <select name="merchant_id" class="form-control" id="ControlSelect1">
                                    @foreach($merchants as $merchant)
                                        <option value="{{ $merchant->id }}">{{ $merchant->business_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row d-flex">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">Name</label>
                                        <input type="text" name="name_en"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">Name (AR)</label>
                                        <input type="text" name="name_ar"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ControlSelect2">is Main?</label>
                                <select name="is_main" class="form-control" id="ControlSelect2">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
