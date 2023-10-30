@extends('admin.admin_dashboard')

@section('title', 'Add News Post')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add News Post</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            <form method="post" action="{{ route('store.admin') }}">
                @csrf

                <div class="row">
                    <div class="col-md-8">

                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">Add News Post</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="news_title">News Title</label>
                                    <input type="text" class="form-control @error('news_title') is-invalid @enderror" name="news_title" id="news_title">
                                    @error('news_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="news_details">News Details</label>
                                    <textarea name="news_details" id="news_details" class="form-control @error('news_details') is-invalid @enderror" rows="5"></textarea>
                                    @error('news_details')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username">
                                            @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">Category</h3>
                            </div>
                            <div class="card-body">
                                <select name="category_id" class="custom-select">
                                    <option selected>- Select Category -</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">Subcategory</h3>
                            </div>
                            <div class="card-body">
                                <select name="subcategory_id" class="custom-select">
                                    <option selected>- Select Subcategory -</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">Writer</h3>
                            </div>
                            <div class="card-body">
                                <select name="user_id" class="custom-select">
                                    <option selected>- Select Writer -</option>
                                    @foreach($admin_user as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">News Post Photo</h3>
                            </div>
                            <div class="card-body">
                                <img class="profile-user-img img-fluid img-square mb-2" id="show_image" src="{{ url('upload/no_image.png') }}" alt="">
                                <div class="form-group">
                                    <label for="show_image">Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Update Image
        $(document).ready(function() {
            $('#image').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
