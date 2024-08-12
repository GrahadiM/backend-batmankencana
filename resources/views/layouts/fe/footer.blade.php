
<!-- LOGOUT -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<!-- LOGOUT -->

<!-- Start FOOTER -->
<footer>
    <div class="footer-bottom">
        <div class="container">
            <img src="{{ asset('customer') }}/assets/images/payment.png" alt="payment method" class="payment-img">
            <p class="copyright text-light">
                Copyright &copy; <a href="{{ config('app.website', 'http://localhost') }}" target="_blank">{{ config('app.name', 'Laravel') }}</a> all rights reserved.
            </p>
        </div>
    </div>
</footer>
<!-- End FOOTER -->
