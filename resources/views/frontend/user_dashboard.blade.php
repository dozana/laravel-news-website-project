@extends('frontend.home_dashboard')

@section('home')
    <div class="container flex-grow">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="text-center">
                    <img src="https://place-hold.it/120x120" class="mb-3" alt="">
                    <h3>John Doe</h3>
                    <p>john@mail.com</p>
                </div>

                <ul class="list-group mb-3">
                    <li class="list-group-item"><a href="#">Your Profile</a></li>
                    <li class="list-group-item"><a href="#">Change Password</a></li>
                    <li class="list-group-item"><a href="#">Read Later List</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        User Account
                    </div>
                    <div class="card-body">
                        <form method="post" action="#">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
