@extends('admin.admin_dashboard')

@section('title', 'Edit Permission')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Permission</h1>
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
                            <h3 class="card-title">Edit Permission</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <form method="post" action="{{ route('update.permission', $permission->id) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Add Permission</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $permission->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="group_name">Group Name</label>
                                    <select class="form-control @error('group_name') is-invalid @enderror" name="group_name" id="group_name">
                                        <option selected disabled>- Select Category -</option>
                                        <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>Category</option>
                                        <option value="subcategory" {{ $permission->group_name == 'subcategory' ? 'selected' : '' }}>SubCategory</option>
                                        <option value="news" {{ $permission->group_name == 'news' ? 'selected' : '' }}>News</option>
                                        <option value="banner" {{ $permission->group_name == 'banner' ? 'selected' : '' }}>Banner</option>
                                        <option value="photo" {{ $permission->group_name == 'photo' ? 'selected' : '' }}>Photo</option>
                                        <option value="video" {{ $permission->group_name == 'video' ? 'selected' : '' }}>Video</option>
                                        <option value="live" {{ $permission->group_name == 'live' ? 'selected' : '' }}>Live</option>
                                        <option value="review" {{ $permission->group_name == 'review' ? 'selected' : '' }}>Review</option>
                                        <option value="seo" {{ $permission->group_name == 'seo' ? 'selected' : '' }}>SEO</option>
                                        <option value="setting" {{ $permission->group_name == 'setting' ? 'selected' : '' }}>Settings</option>
                                        <option value="admin" {{ $permission->group_name == 'admin' ? 'selected' : '' }}>Admin Setting</option>
                                        <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>Role & Permission</option>
                                    </select>
                                    @error('group_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
