<tr>
    <td>{{ $call->created_at }}</td>
    <td>{{ $call->user->name }}</td>
    <td>
        @if ($call->status == 1)
            Rejected
        @elseif ($call->status == 2)
            Waiting
        @else
            Accepted
    @endif
    <td>{{ $call->description }}</td>
    </td>
    @isset($field)
        <th>{{ $call->status }}</th>
    @endisset
</tr>
