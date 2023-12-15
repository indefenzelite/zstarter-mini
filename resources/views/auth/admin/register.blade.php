@extends('layouts.empty')

@section('meta_data')
    @php
        $meta_title = 'Register';
    @endphp
@endsection

@section('content')
    <section class="bg-home-75vh">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-signin p-4 rounded shadow mt-5">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('register',$role) }}" method="post" class="mt-3">
                            @csrf
                          
                            <h5 class="mb-3 text-center">Join us</h5>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-2">
                                        <input type="text" pattern="[a-zA-Z]+.*"
                                            title="Please enter first letter alphabet and at least one alphabet character is required."
                                            class="form-control" id="floatingInput" placeholder="Enter First Name"
                                            name="first_name" value="{{ old('first_name') }}" required>
                                        <label for="floatingInput">First Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-2">
                                        <input type="text" pattern="[a-zA-Z]+.*"
                                            title="Please enter first letter alphabet and at least one alphabet character is required."class="form-control"
                                            id="floatingInput" placeholder="Enter last Name" name="last_name"
                                            value="{{ old('last_name') }}" required>
                                        <label for="floatingInput">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" pattern="[a-zA-Z]+.*"
                                    title="Please enter first letter alphabet and at least one alphabet character is required."
                                    id="floatingEmail" placeholder="name@example.com" name="email"
                                    value="{{ old('email') }}" required>
                                <label for="floatingEmail">Email Address</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="floatingPhone" min="0"
                                    placeholder="Enter Phone Number" name="phone"  pattern="^[0-9]*$" value="{{ old('phone') }}" required>
                                <label for="floatingPhone">Phone Number</label>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating form-group mb-2">
                                        <input id="floatingPassword" type="password" pattern="[a-zA-Z]+.*"
                                            title="Please enter first letter alphabet and at least one alphabet character is required."
                                            class="form-control" placeholder="Password" name="password" required>
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating form-group mb-2">
                                        <input id="floatingPassword" type="password" pattern="[a-zA-Z]+.*"
                                            title="Please enter first letter alphabet and at least one alphabet character is required."class="form-control"
                                            placeholder="Confirm Password" name="password_confirmation" required>
                                        <label for="floatingPassword">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mx-3">
                                <input class="form-check-input" required type="checkbox" value=""
                                    id="flexCheckDefault">
                                <label class="form-check-label fw-normal text-muted fs-6 ln-1" for="flexCheckDefault">
                                    <small>
                                        By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You
                                        may receive SMS notifications from us and can opt out at any time.
                                    </small>
                                </label>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Complete Registration</button>

                            <div class="col-12 text-center mt-3">
                                <a href="{{ url('login') }}" class="text-dark">Already have an account?</a>
                            </div><!--end col-->

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
