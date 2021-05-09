<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 phone pl-md-2">
                    <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +381 61 123 45 67</a>
                    <a href="#"><span class="fa fa-paper-plane mr-1"></span> liquor.store@gmail.com</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="social-media mr-4">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    </p>
                </div>
                <div class="reg">
                    @if(!session()->has('user'))
                        <p class="mb-0"><a href="{{ route('registration.form') }}" class="mr-2">Sign Up</a> <a href="{{ route('login.form') }}">Log In</a></p>
                    @else
                        <p class="mb-0"><a href="{{ route('logout') }}" class="mr-2">Log out</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
