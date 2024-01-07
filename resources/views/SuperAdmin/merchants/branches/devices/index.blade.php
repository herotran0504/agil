@extends('SuperAdmin.layout')
@section('title')
    Devices (POS)
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
            <div class="card website-settings-card shadow mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab"
                            aria-controls="pills-posts"><i class="fa fa-pencil"></i> List of Devices @if($branchName)({{ $branchName }}) @endif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-addpost-tab" data-toggle="pill" href="#pills-addpost" role="tab"
                            aria-controls="pills-addpost"><i class="fa fa-plus"></i> New POS</a>
                    </li>
                </ul>
                <div class="row tab-content mt-2" id="pills-tabContent">
                    <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                        id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Business</th>
                                    <th class="text-center">Dates</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devices as $pos)
                                    <tr>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $pos->username}}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $pos->type }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $pos->branch->name_en }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $pos->created_at }} <br> {{ $pos->updated_at }}
                                        </th>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="{{ route('ad_pos_invoices', ['id' => $pos->id]) }}"
                                                class="btn btn-info btn-sm">Invoices</a>
                                            <a href="{{ route('ad_pos_edit', ['id' => $pos->id]) }}"
                                                class="btn btn-primary btn-sm">Edit POS</a>
                                            <a href="{{ route('ad_pos_delete', ['id' => $pos->id]) }}"
                                                class="btn btn-danger btn-sm">Delete POS</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpost" role="tabpanel"
                        aria-labelledby="pills-addpost-tab">
                        <form action="{{ route('ad_pos_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="ControlSelect1">Branch</label>
                                <select name="branch_id" class="form-control" id="ControlSelect1">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name_en.'-'.$branch->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row d-flex">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">Username</label>
                                        <input type="text" name="username"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">Password</label>
                                        <input type="text" name="password"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
