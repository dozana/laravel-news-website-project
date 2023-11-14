@extends('admin.admin_dashboard')

@section('title', 'Add Role')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add Role</h1>
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
                            <h3 class="card-title">Add Role</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <form method="post" action="{{ route('store.role') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Add Role</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                    @error('name')
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
