@extends('layouts.app')

@section('title', 'Leads')

@section('pageHeader', 'All Leads')

@section('content')

 
   <div id="lead-table-content">
    {!! $table !!}
   </div>


    <!-- Modals -->
    <div class="modal fade" id="modal-assigned" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assigned Sales Man</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('leads.assigned') }}"
                      method="post"
                      class="text-center">
                    @csrf
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
