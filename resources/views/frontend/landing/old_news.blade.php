<div class="card mb-4">
    <div class="card-header">Old News</div>
    <div class="card-body">
        <form action="{{ route('search-by-date') }}" method="post">
            @csrf
            <div class="input-group">
                <input type="date" name="date" class="form-control">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>
    </div>
</div>
