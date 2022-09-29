@extends('layouts.app')

@section('title', 'Leads')

@section('pageHeader', 'Edit Lead')

@section('content')
    <form action="{{ route('leads.update', $lead) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $lead->name }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{ $lead->phone }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $lead->email }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $lead->address }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
