@extends('layouts.fontApp')
@section('title','Login')
@section('style')
    <link href="assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container  mt-lg-20" style="margin-bottom: auto;margin-top: auto">

        <div class="d-flex flex-column flex-root rounded">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-15">

                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-20">
                                <h3>@lang('Login')</h3>
                                <div class="text-muted font-weight-bold">@lang('Enter your details to login to your account'):</div>
                            </div>
                            <x-auth-session-status class="mb-4 text-danger" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                            <form class="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <x-input id="email" class="form-control h-auto form-control-solid py-4 px-8" type="text" name="email" :value="old('email')" placeholder="Email" autocomplete="off" required autofocus />
                                </div>
                                <div class="form-group mb-5">
                                    <x-input id="password" class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password"
                                             type="password"
                                             name="password"
                                             required autocomplete="current-password" />

                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0 text-muted">
                                            <input type="checkbox" name="remember" />
                                            <span></span>@lang('Remember me')</label>
                                    </div>
                                    {{--                                <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">@lang('Forget Password') ?</a>--}}
                                </div>
                                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">@lang('Login')</button>

                                <div class="mt-10">
                                    <span class="opacity-70 mr-4">@lang("Don't have an account yet")?</span>
                                    <button type="button" class="btn btn-link text-muted text-hover-primary font-weight-bold" data-toggle="modal" data-target="#exampleModal">
                                        @lang('Register')
                                    </button>

                                </div>
                            </form>


                        </div>
                        <!--end::Login Sign in form-->

                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">@lang("Register")</h5>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">ລົງທະບຽນລູກຄ້າ</h5>
                    <a href="{{route('customer.register')}}" class="btn btn-success btn-block">@lang("Register")<i class="fas fa-user-tie ml-2"></i></a>

                    <hr>
                    <h5 class="text-center">ລົງທະບຽນຮ້ານຄ້າ</h5>
                    <a href="{{route('store.register')}}" class="btn btn-primary btn-block">@lang("Register") <i class="fas fa-store ml-2"></i></a>
                </div>

            </div>
        </div>
    </div>
@endsection
