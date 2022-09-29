
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Sales</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
    <tr>
        <td>{{ $lead->id }}</td>
        <td>{{ $lead->name }}</td>
        <td>{{ $lead->phone }}</td>
        <td>{{ $lead->email }}</td>
        <td>{{ isset($lead->sales->name) ? $lead->sales->name : '' }}</td>
        <td>
            <a href="{{ route('leads.show', $lead) }}" class="btn btn-info">Show</a>
            @if (Auth::user()->role->slug == 'ADM')
            <button type="button"
                    lead-id="{{ $lead->id }}"
                    class="btn btn-primary update-sales"
                    data-toggle="modal"
                    data-target="#modal-assigned">
                Update Sales Man
            </button>
                {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-assigned">--}}
                    {{--Assigned--}}
                {{--</button>--}}

            @endif
            @if (Auth::user()->role->slug == 'ADM')
                <a href="{{ route('leads.edit', $lead) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('leads.destroy', $lead) }}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
            @if (
            Auth::user()->role->slug == 'ADM' ||
            Auth::user()->role->slug == 'TMLD' ||
            Auth::user()->role->slug == 'SAL'
            )
                <a href="{{ route('calls.create', $lead) }}" class="btn btn-primary">Call</a>
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
    {{ $leads->links() }}
</table>

