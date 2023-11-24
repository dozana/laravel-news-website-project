{{--<footer class="bg-dark text-white border-top py-3">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 col-md-12 text-center">--}}
{{--                <small>&copy; 2023 :: Made with ❤️ by <strong>Technology</strong></small>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}

<footer class="footer border-top py-3 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md col-12">
                <h5 class="h5 pt-2">Contact Information</h5>
                <p><i class="fa fa-location-arrow"></i> Georgia, Tbilisi </p>
                <p><i class="fa fa-envelope"></i> info@technology.ge</p>
            </div>

            <div class="col-sm-4 col-md col-6">
                <h5 class="h5 pt-2">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">HTML Basics</a></li>
                    <li><a href="#">CSS Styling</a></li>
                    <li><a href="#">JavaScript Fundamentals</a></li>
                    <li><a href="#">ReactJS Tutorials</a></li>
                    <li><a href="#">PHP Development</a></li>
                    <li><a href="#">Web Design Principles</a></li>
                </ul>
            </div>

            <div class="col-sm-4 col-md col-6">
                <h5 class="h5 pt-2">About Us</h5>
                <p>Tutorial site, offering comprehensive resources on HTML, CSS, JavaScript, and more. It provides interactive examples, exercises, and references for learners and developers.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <small>&copy; 2023 :: Made with ❤️ by <strong>Technology</strong></small>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/dist/js/bootstrap.bundle.js') }}"></script>
@yield('scripts')
