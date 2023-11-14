@extends('admin.admin_dashboard')

@section('title', 'Add Permission')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add Permission</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Permission</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <form method="post" action="{{ route('store.permission') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="group_name">Group Name</label>
                                    <select class="form-control @error('group_name') is-invalid @enderror" name="group_name" id="group_name">
                                        <option selected disabled>- Select Category -</option>
                                        <option value="category">Category</option>
                                        <option value="subcategory">SubCategory</option>
                                        <option value="news">News</option>
                                        <option value="banner">Banner</option>
                                        <option value="photo">Photo</option>
                                        <option value="video">Video</option>
                                        <option value="live">Live</option>
                                        <option value="review">Review</option>
                                        <option value="seo">SEO</option>
                                        <option value="setting">Settings</option>
                                        <option value="admin">Admin Setting</option>
                                        <option value="role">Role & Permission</option>
                                    </select>
                                    @error('group_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
