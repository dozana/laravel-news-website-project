<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="{{ route('news.search') }}" method="get" class="mb-3">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" placeholder="Search" aria-label="Search" aria-describedby="search-button">
                        <button class="btn btn-outline-secondary" type="submit" id="search-button">Search</button>
                    </div>
                    @error('search')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>
