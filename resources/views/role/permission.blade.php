@extends('layouts.newApp')
@section('title','Role')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('Users')</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('role.index')}}" class="text-muted">@lang('Role')</a>
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
        <a href="{{route('role.index')}}"  class="btn btn-light-primary font-weight-bolder btn-sm"  ><i class="fas fa-house-user"></i> List Role</a>
        <!--end::Actions-->

    </div>
@endsection


@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Edit Role</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">

                </div>
            </div>
        </div>



        <div class="card-body">
            <form method="post" action="{{route('role.update',$role->id)}}">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label><b>Role Name</b></label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$role->name)}}" required>
                </div>
                <div class="form-group">
                    <label for="title"><b>Select Permission</b></label><br>
                    @foreach($permissions as $permission)
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-lg">
                                <input type="checkbox"  name="permission[]" value="{{$permission->name}}"
                                       @foreach($role->permissions as $checkPermission)
                                       @if($permission->name == $checkPermission->name)
                                       checked
                                    @endif
                                    @endforeach
                                >


                                <span></span>
                                {{$permission->name}}
                            </label>

                        </div>
                    @endforeach

                </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary btn-block">Save changes</button>
            </div>
            </form>
        </div>



    </div>



@endsection
