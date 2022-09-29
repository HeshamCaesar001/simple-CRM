<input type="hidden" name="lead" value="{{ $lead->id }}">

<label for="sales">Sales</label>
    <select name="sales" id="sales" class="form-control">
        <option value=>Select Sales</option>
        @foreach($sales as $user)
            @if ($lead->sales_id == $user->id)
                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
            @else
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
        @endforeach
    </select>
</form>
