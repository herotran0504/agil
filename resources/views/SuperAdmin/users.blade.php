@extends('SuperAdmin.layout')
@section('title')
    Users
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
            <div class="card website-settings-card shadow mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab"
                            aria-controls="pills-posts"><i class="fa fa-pencil"></i> List of Users</a>
                    </li>
                </ul>
                <div class="row tab-content mt-2" id="pills-tabContent">
                    <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                        id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $user->national_id }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $user->name }}
                                            <br>
                                            {{ $user->f_name_ar.' '.$user->m_name_ar.' '.$user->l_name_ar }}
                                            <br>
                                            {{ $user->f_name_en.' '.$user->m_name_en.' '.$user->l_name_en }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $user->email }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $user->phone }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
