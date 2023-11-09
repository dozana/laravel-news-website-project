@extends('admin.admin_dashboard')

@section('title', 'Add Photo Gallery')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add Photo Gallery</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Photo Gallery</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('store.category') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="multi_image">Multi Photo Gallery</label>
                                    <input type="file" class="form-control-file @error('multi_image') is-invalid @enderror" name="multi_image[]" id="multi_image" multiple>
                                    @error('multi_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Preview Photo Gallery</h3>
                        </div>
                        <div class="card-body">
                            <div id="preview_img"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        var previewImgDiv = $('#preview_img');

        // Display initial message
        previewImgDiv.html('There are no images selected');

        $('#multi_image').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                previewImgDiv.empty(); // Clear any previous messages or images
                $.each(data, function(index, file){ // loop through each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ // check supported file type
                        var fRead = new FileReader(); // new filereader
                        fRead.onload = (function(file){ // trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100).height(80); // create image element
                                previewImgDiv.append(img); // append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); // URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
@endsection
