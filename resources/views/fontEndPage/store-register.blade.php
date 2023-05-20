@extends('layouts.fontApp')
@section('title','Store Register')
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
                                <h3 class="bg-secondary p-1 rounded py-3" >ລົງທະບຽນຮ້ານຄ້າ <i class="fas fa-store ml-2"></i></h3>

                            </div>

                            <form action="{{route('store.register.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>

                                    <div class="mt-4">
                                        <x-label for="name" :value="__('ຊື່ຮ້ານຄ້າ')" />

                                        <x-input id="name" class="block mt-1 w-full form-control" type="text" name="fname" :value="old('fname')" required  />
                                    </div>

                                    <div class="mt-4">
                                        <x-label for="name" :value="__('ຊື່ເຈົ້າຂອງຮ້ານຄ້າ')" />

                                        <x-input id="name" class="block mt-1 w-full form-control" type="text" name="lname" :value="old('lname')" required  />
                                    </div>

                                    <div class="mt-4">
                                        <x-label for="name" :value="__('ເບີໂທ')" />

                                        <x-input id="name" class="block mt-1 w-full form-control" type="text" name="mobile" :value="old('mobile')" required  />
                                    </div>

                                    <div class="mt-4">
                                        <x-label for="name" :value="__('ທີ່ຢູ່')" />

                                        <x-input id="name" class="block mt-1 w-full form-control" type="text" name="address" :value="old('address')" required  />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-label for="email" :value="__('Email')" />

                                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-label for="password" :value="__('Password')" />

                                        <x-input id="password" class="block mt-1 w-full form-control"
                                                 type="password"
                                                 name="password"
                                                 required autocomplete="new-password" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                                 type="password"
                                                 name="password_confirmation" required />
                                    </div>

                                    <div class="form-group mt-4">
                                        <label>@lang('Image')</label>
                                        <input type='file' name="image" onchange="readURLImage(this);" class="form-control"/>
                                        <div class="d-flex justify-content-center mt-2">
                                            <img id="image" width="180px" />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-10 btn-block">@lang('Register')</button>



                                </div>

                            </form>
                            <div class="mt-4">

                                <a class="topbar-item "  href="{{route('client.login')}}">
                                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg">
											<span class="svg-icon svg-icon-xl svg-icon-light mr-2 ">

											         <i class=" far fa-user-circle"></i>
                                            </span>
                                        <span > @lang('Login')</span>
                                        <span class="pulse-ring"></span>
                                    </div>
                                </a>

                            </div>

                        </div>
                        <!--end::Login Sign in form-->

                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
    </div>

    <script>

        function readURLImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
