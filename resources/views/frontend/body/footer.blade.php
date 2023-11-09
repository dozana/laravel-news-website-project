{{--<footer class="bg-light border-top py-5">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-2">--}}
{{--                <h5>Column 1</h5>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="#">Link 1</a></li>--}}
{{--                    <li><a href="#">Link 2</a></li>--}}
{{--                    <li><a href="#">Link 3</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <h5>Column 2</h5>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="#">Link 1</a></li>--}}
{{--                    <li><a href="#">Link 2</a></li>--}}
{{--                    <li><a href="#">Link 3</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <h5>Column 3</h5>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="#">Link 1</a></li>--}}
{{--                    <li><a href="#">Link 2</a></li>--}}
{{--                    <li><a href="#">Link 3</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <h5>Column 4</h5>--}}
{{--                <ul class="list-unstyled">--}}
{{--                    <li><a href="#">Link 1</a></li>--}}
{{--                    <li><a href="#">Link 2</a></li>--}}
{{--                    <li><a href="#">Link 3</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <h5>Column 5</h5>--}}
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel metus scelerisque ante sollicitudin.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}

<footer class="bg-light border-top text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                &copy; 2023 NEWS. All rights reserved.
            </div>
            <div class="col-lg-6 col-md-6">
                @php
                    $current_date = new DateTime();
                @endphp
                <i class="far fa-calendar-alt"></i>{{ $current_date->format('l d-m-Y') }}
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/dist/js/bootstrap.bundle.js') }}"></script>
@yield('scripts')
