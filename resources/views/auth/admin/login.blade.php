@extends('layouts.empty')

@section('meta_data')
    @php
		$meta_title = 'Login';			
	@endphp
@endsection

<style>
    .field-icon {
        float: right;
        margin-right: 7px;
        margin-top: -34px;
        position: relative;
        z-index: 2;
    }
    .alert {
        padding: 0px 15px !important;
    }
    .alert-danger {
        color: #842029 !important;
        background-color: #f8d7da !important;
        border-color: #f5c2c7 !important;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        text-align: center;
        font-weight: 600;
    }
    @media(max-width: 700px){
        .custom-input_box{
            width: 25px !important;
            height: 30px;
            border: 0;
            border-bottom: 1px solid #817d7d;
        }
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    } 
</style>
@section('content')
<section class="bg-home-75vh">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-3 bg-white rounded shadow form-signin">
                    <form method="POST" action="{{ route('login',$role) }}">
                        @csrf
                        <h5 class="mb-3 text-center">Sign in to continue</h5>
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn close text-white" data-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn close text-white" data-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="floatingInput">Email Address</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-field" placeholder="Password" name="password" required>
                            <label for="password-field">Password</label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1" id="flexCheckDefault" name="item_checkbox">
                                    <label class="form-check-label fw-normal" for="flexCheckDefault">Remember me</label>
                                </div>
                            </div>
                        </div>
        
                        <button class="btn btn-primary w-100" type="submit">Secure Sign-In</button>

                        <div class="col-12 text-center mt-3">
                            <a href="{{ route('register',$role) }}" class="text-dark">Don't have an account?</a>
                        </div><!--end col-->

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('script')

<script>
    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());
            
            if(e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));
                
                if(prev.length) {
                    $(prev).select();
                }
            } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) { 
                var next = parent.find('input#' + $(this).data('next'));
                
                if(next.length) {
                    $(next).select();
                } else {
                    if(parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });

    $('.custom-input_box').on('click keyup paste', function(){
        var input_val = $(this).val();
        console.log(input_val);
        if(input_val.length > 1){
            $(this).val(input_val.slice(0, 1));
        }
    });
    $(document).on('click','.toggle-password',function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
    
@endpush