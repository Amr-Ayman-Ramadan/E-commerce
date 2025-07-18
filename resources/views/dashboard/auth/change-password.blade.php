@extends("layout/dashboard/auth/auth")
@section("title","login")
@section("content")
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset("assets/dashboard")}}/images/logo/logo-dark.png" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>We will send you a link to reset password.</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{route('dashboard.auth.changePassword')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ old('email') ?? $email ?? '' }}">

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" class="form-control form-control-lg input-lg"
                                                       placeholder="Enter Your Password" required>
                                                @error("password")
                                                <div class="text-danger mt-1">{{$message}}</div>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-lock"></i>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password_confirmation" class="form-control form-control-lg input-lg"
                                                       placeholder="Enter Your Password" required>
                                                @error("password_confirmation")
                                                <div class="text-danger mt-1">{{$message}}</div>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-lock"></i>
                                                </div>
                                            </fieldset>

                                            <button type="submit" class="btn btn-outline-info btn-lg btn-block">
                                                <i class="ft-unlock"></i> Confirm OTP
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center"><a href="{{route("dashboard.auth.loginPage")}}" class="card-link">Login</a></p>
                                    {{--                                    <p class="float-sm-right text-center">New to Modern ? <a href="register-simple.html" class="card-link">Create Account</a></p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
