@extends('layouts.newApp')
@section('title','User')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('Users')</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('users.index')}}" class="text-muted">@lang('List')</a>
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

                <a  class="btn btn-light-primary font-weight-bolder btn-sm"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-house-user"></i> @lang('New User')</a>

            <!--end::Actions-->

    </div>
@endsection


@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">ລາຍການຜູ້ໃຊ້</h3>
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
                        <th>@lang('Name')</th>
                        <th>@lang('Email')</th>
{{--                        <th>ROLE</th>--}}
{{--                        <th>@lang('Action')</th>--}}
                        <th>@lang('Updated at')</th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_users as $item)
                        <tr>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->fname}}</td>
                            <td>{{$item->email}}</td>
{{--                            <td>--}}
{{--                                @foreach($item->roles as $role) [{{$role->name}}] @endforeach--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex justify-content-start m-0">--}}

{{--                                    <a href="{{route('user.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit text-warning"></i></a>--}}


{{--                                        <form action="{{route('user.destroy',$item->id)}}" method="post" class="delete{{$item->id}}">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class=" btn btn-link delete_button" data-id="{{$item->id}}"><i class="fas fa-trash text-danger"></i></button>--}}
{{--                                    </form>--}}

{{--                                </div>--}}

{{--                            </td>--}}
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
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('New User')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
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
{{--                        <div class="form-group">--}}
{{--                            <label>Role</label>--}}
{{--                            <select class="form-control" name="permission">@foreach($roles as $role)--}}
{{--                                    <option value="{{$role->name}}"> {{$role->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
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
