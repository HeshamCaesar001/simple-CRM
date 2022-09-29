@extends('layouts.app')

@section('title', 'Leads')

@section('pageHeader', 'Show Lead')

@section('content')
    <h3><span class="text-bold">Name:</span> {{ $lead->name }}</h3>
    <p><span class="text-bold">Phone:</span> {{ $lead->phone }}</p>
    <p><span class="text-bold">Email:</span> {{ $lead->email }}</p>
    <p><span class="text-bold">Address:</span> {{ $lead->address }}</p>
    <div>
        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('leads.destroy', $lead) }}" class="btn btn-danger">Delete</a>
    </div>

@endsection
