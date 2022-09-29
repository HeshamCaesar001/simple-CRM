{{-- <td> --}}
    {{--{!! $lead->sales? $lead->sales->name : '<span class="alert alert-danger">unassigned</span>' !!}--}}
    {{-- <form action="{{ route('leads.assigned') }}" method="post" class="text-center">
        @csrf
        <input type="hidden" name="lead" value="{{ $lead->id }}">
        <select name="sales" id="sales" class="form-control" required>
            <option value="0">Unassigned</option>
            @foreach($sales as $user)
                @if ($lead->sales && $lead->sales->id === $user->id)
                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary m-2">Save</button>
    </form> --}}
{{-- </td> --}}
