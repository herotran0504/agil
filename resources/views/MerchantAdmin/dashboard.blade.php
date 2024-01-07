@extends('MerchantAdmin.layout')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container">
    <p>This is the control panel for <b>Merchant Admins</b> <h1 style="color: red;"> {{ auth()->guard('merchant_admin')->user()->name }} </h1> </p>
</div>
@endsection
