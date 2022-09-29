<form action="{{ route('calls.store', $lead) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value=>Select Status</option>
            <option value="1">Rejected</option>
            <option value="2">Waiting</option>
            <option value="3">Accepted</option>
        </select>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
