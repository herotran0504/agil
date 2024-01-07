@extends('SuperAdmin.layout')
@section('title')
    Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
            <div class="card website-settings-card shadow mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab"
                            aria-controls="pills-posts"><i class="fa fa-pencil"></i> Invoices ({{ $devic->username }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-addpost-tab" data-toggle="pill" href="#pills-addpost" role="tab"
                            aria-controls="pills-addpost"><i class="fa fa-plus"></i> New Invoice</a>
                    </li>
                </ul>
                <div class="row tab-content mt-2" id="pills-tabContent">
                    <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                        id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#Number</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Items</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->invoice_number}}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->total }} SAR
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->invoice_type }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->invoice_status }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->invoice_date }} <br> {{ $invoice->invoice_time }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->user->name }}
                                        </th>
                                        <th style="vertical-align: middle;" class="text-center">
                                            {{ $invoice->items }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpost" role="tabpanel"
                        aria-labelledby="pills-addpost-tab">
                        <form action="{{ route('ad_pos_invoices_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="dvice_id" value="{{ $devic->id }}" />
                            <div class="row d-flex">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">Number</label>
                                        <input type="text" name="invoice_number"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Total</label>
                                        <input type="text" name="total"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Type</label>
                                        <input type="text" name="invoice_type"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ControlSelect1">User</label>
                                        <select name="user_id" class="form-control" id="ControlSelect1">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="home-page-label">Status</label>
                                        <input type="text" name="invoice_status"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Date</label>
                                        <input type="text" name="invoice_date"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Time</label>
                                        <input type="text" name="invoice_time"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Items</label>
                                        <input type="text" name="items"
                                            class="form-control">
                                        <small>ex:item1,item2,..</small>
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
