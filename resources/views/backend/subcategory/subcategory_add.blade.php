@extends('admin.admin_dashboard')

@section('title', 'Add Subcategory')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add Subcategory</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header py-3">
                            <h3 class="card-title">Add Subcategory</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('store.subcategory') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="category_id">Category ID</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                        <option selected disabled>- Select Category -</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subcategory_name">Subcategory Name</label>
                                    <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" id="subcategory_name">
                                    @error('subcategory_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
