<footer class="bg-primary text-light text-center py-3">
    <div class="container">
        &copy; 2023 NEWSPORTAL. All rights reserved.
        @php
            $current_date = new DateTime();
        @endphp
        <i class="far fa-calendar-alt"></i>{{ $current_date->format('l d-m-Y') }}
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/dist/js/bootstrap.bundle.js') }}"></script>
@yield('scripts')
