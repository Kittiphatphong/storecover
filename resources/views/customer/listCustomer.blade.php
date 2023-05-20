@extends('layouts.newApp')
@section('title','Customer')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('Customers')</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('customer.index')}}" class="text-muted">@lang('List')</a>
                </li>
                {{--            <li class="breadcrumb-item">--}}
                {{--                <a href="" class="text-muted">Bill 3/40</a>--}}
                {{--            </li>--}}
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->

        <a  class="btn btn-light-primary font-weight-bolder btn-sm"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-user-friends"></i>ເພີ່ມລູກຄ້າ</a>

        <!--end::Actions-->

    </div>
@endsection


@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">ລາຍການລູກຄ້າ</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">

                </div>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                    <tr>

                        <th>@lang('Created at')</th>
                        <th>ຊື່</th>
                        <th>ນາມສະກຸນ</th>
                        <th>ເພດ</th>
                        <th>ວັນເກີດ</th>
                        <th>@lang('Email')</th>
                        <th>ເບີໂທ</th>
                        <th>ທີ່ຢູ່</th>
                        <th>@lang('Action')</th>

                        <th>@lang('Updated at')</th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_customers as $item)
                        <tr>
                            <td>{{$item->created_at}}</td>

                            <td>{{$item->fname}}</td>
                            <td>{{$item->lname}}</td>
                            <td>@lang($item->gender)</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->address}}</td>

                            <td>
                                <div class="d-flex justify-content-start m-0">

                                    @if($item->status == 1)
                                        <form action="{{route('customer.show',$item->id)}}"  method="get" class="confirm{{$item->id}}">
                                            <button type="submit" class=" btn btn-ink confirm_button" data-id="{{$item->id}}"><i class="fas fa-power-off fa-lg text-primary"></i></button>
                                        </form>
                                    @else
                                        <form action="{{route('customer.show',$item->id)}}"  method="get" class="confirm_form confirm{{$item->id}}">
                                            <button type="submit" class=" btn btn-ink confirm_button" data-id="{{$item->id}}"><i class="fas fa-power-off fa-lg text-light"></i></button>
                                        </form>
                                    @endif

                                    <a href="{{route('customer.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit text-warning"></i></a>




                                </div>

                            </td>
                            <td>{{$item->updated_at}}</td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ເພີ່ມລູກຄ້າ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('customer.store')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mt-4">
                            <x-label for="name" :value="__('ຊື່')" />

                            <x-input id="name" class="block mt-1 w-full form-control" type="text" name="fname" :value="old('fname')" required  />
                        </div>

                        <div class="mt-4">
                            <x-label for="name" :value="__('ນາມສະກຸນ')" />

                            <x-input id="name" class="block mt-1 w-full form-control" type="text" name="lname" :value="old('lname')" required  />
                        </div>
                        <div class="mt-4">
                            <x-label for="name" :value="__('ເພດ')" />

                            <select class="lock mt-1 w-full form-control" name="gender">
                                <option value="male">@lang('male')</option>
                                <option value="female">@lang('female')</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="name" :value="__('ວັນເກີດ')" />

                            <x-input id="name" class="block mt-1 w-full form-control" type="date" name="birthday" :value="old('birthday')" required  />
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



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Save changes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
