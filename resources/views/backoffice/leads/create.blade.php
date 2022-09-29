@extends('layouts.app')

@section('title', 'Leads')

@section('pageHeader', 'Create Lead')

@section('content')
    <form action="{{ route('leads.store') }}" method="post">
        @csrf
        @include('shared.input', [
                'name'=> 'name',
                'label'=> 'Name',
                'value'=> old('name')
                ])
        @include('shared.input', [
                'name'=> 'phone',
                'label'=> 'Phone',
                'value'=> old('phone'),
                'type'=> 'tel'
                ])
        @include('shared.input', [
                'name'=> 'email',
                'label'=> 'Email',
                'value'=> old('email'),
                'type'=> 'email'
                ])

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
