<table class="table table-striped">
    <thead>
    <tr>
        <th>Date</th>
        <th>User</th>
        <th>Status</th>
        <th>Description</th>
        @isset($field)
            <th>test</th>
        @endisset
    </tr>
    </thead>
    <tbody>
    @foreach($calls as $call)
        @include('backoffice.calls.table-row')
    @endforeach
    </tbody>
</table>
