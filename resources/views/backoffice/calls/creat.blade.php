@extends('layouts.app')

@section('title', 'Make Call')

@section('pageHeader', 'Make Call')

@section('content')
    <div class="col-xs-12">
        @include('backoffice.calls.form')
    </div>
    <hr>
    <div class="col-xs-12">
        @include('backoffice.calls.table',['call'=>$calls, 'field'=> 'test'])
    </div>
@endsection
