<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">YouTube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Embed YouTube video here -->
                <div class="ratio ratio-16x9">
                    <iframe id="youtubeIframe"
                            class="embed-responsive-item"
                            width="100%"
                            height="315"
                            src="{{ $live_tv->live_url }}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <img src="{{ asset($live_tv->live_image) }}" class="card-img-top" alt="Cover Image" data-bs-toggle="modal" data-bs-target="#videoModal">
    <div class="card-header">Live Stream</div>
</div>
