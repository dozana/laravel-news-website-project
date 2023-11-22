<h5 class="mb-4 py-2 bg-light">Photo Gallery</h5>
<div class="row">
    @foreach($photo_gallery as $item)
        <div class="col-lg-3 col-md-3">
            <div class="card mb-3">
                <div class="card-body p-0">
                    <img src="{{ asset($item->photo_gallery) }}" class="img-fluid" alt="" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}">
                </div>
                <div class="card-footer text-center">
                    <small>{{ $item->post_date }}</small>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ asset($item->photo_gallery) }}" class="img-fluid" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
