<h5 class="mb-4 py-2 bg-light">Video Gallery</h5>
<table class="table table-bordered">
    <tbody>
    @foreach($video_gallery as $item)
        <tr>
            <td class="align-middle p-1">
                <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal{{ $item->id }}">
                    <img style="width: 100%; height: 40px;" class="img-fluid" src="{{ asset($item->video_image) }}" alt="{{ $item->video_title }}">
                </a>
            </td>
            <td class="align-middle">
                <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal{{ $item->id }}">
                    {{ $item->video_title }}
                </a>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="videoModal{{ $item->id }}" tabindex="-1" aria-labelledby="videoModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel{{ $item->id }}">{{ $item->video_title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="{{ $item->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </tbody>
</table>
