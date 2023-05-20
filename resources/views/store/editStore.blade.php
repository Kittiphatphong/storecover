@extends('layouts.newApp')
@section('title','Store')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">ຮ້ານຄ້າ</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('store.index')}}" class="text-muted">@lang('List')</a>
                </li>
                {{--            <li class="breadcrumb-item">--}}
                {{--                <a href="" class="text-muted">Bill 3/40</a>--}}
                {{--            </li>--}}
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">
        {{--        <!--begin::Actions-->--}}
        {{--        <a href="{{route('role.index')}}"  class="btn btn-light-primary font-weight-bolder btn-sm"  ><i class="fas fa-house-user"></i> List Role</a>--}}
        {{--        <!--end::Actions-->--}}
    </div>
@endsection


@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">ແກ້ໄຂຮ້ານຄ້າ</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">

                </div>
            </div>
        </div>



        <div class="card-body">
            <form method="post" action="{{route('store.update',$edit->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mt-4">
                    <x-label for="name" :value="__('ຊື່ຮ້ານຄ້າ')" />

                    <x-input id="name" class="block mt-1 w-full form-control" type="text" name="fname" value="{{old('fname',$edit->fname)}}" required  />
                </div>

                <div class="mt-4">
                    <x-label for="name" :value="__('ຊື່ເຈົ້າຂອງຮ້ານຄ້າ')" />

                    <x-input id="name" class="block mt-1 w-full form-control" type="text" name="lname" value="{{old('lname',$edit->lname)}}" required  />
                </div>

                <div class="mt-4">
                    <x-label for="name" :value="__('ເບີໂທ')" />

                    <x-input id="name" class="block mt-1 w-full form-control" type="text" name="mobile" value="{{old('mobile',$edit->mobile)}}" required  />
                </div>

                <div class="mt-4">
                    <x-label for="name" :value="__('ທີ່ຢູ່')" />

                    <x-input id="name" class="block mt-1 w-full form-control" type="text" name="address" value="{{old('address',$edit->address)}}" required  />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" value="{{old('email',$edit->email)}}" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full form-control"
                             type="password"
                             name="password"
                              autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                             type="password"
                             name="password_confirmation"  />
                </div>

                <div class="form-group">
                    <label>@lang('Image')</label>

                    <input type='file' name="image" onchange="readURLImage(this);" class="block mt-1 w-full form-control"/>
                    <div class="mt-4 d-flex justify-content-between">
                        <img src="{{$edit->image}}" width="180px" />
                        <div>

                            <img id="image" width="180px" />

                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button class="btn btn-warning btn-block">ແກ້ໄຂ</button>
                </div>
            </form>
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
