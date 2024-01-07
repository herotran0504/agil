@extends('SuperAdmin.layout')
@section('title')
{{ __('sal.dashboard') }}
@endsection
@section('content')
<div class="container">
    <p>{!! trans('sal.txt1') !!}</p>
    <h1>{!! trans('sal.txt2') !!}</h1>
    <h5>{!! trans('sal.txt3', [ 'name' => auth()->guard('admin')->user()->name ]) !!}</h5>
</div>
@endsection
