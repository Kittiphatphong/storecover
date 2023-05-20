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

        <a  class="btn btn-light-primary font-weight-bolder btn-sm"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-house-user"></i> New Role</a>

            <!--end::Actions-->

    </div>
@endsection


@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Role List</h3>
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

                        <th>ID</th>
                        <th>NAME</th>

                        <th>PERMISSION</th>
                        <th>ACTION</th>
                        <th>UPDATED</th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_roles as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>

                            <td>
                                @foreach($item->permissions as $per)
                                    [ {{$per->name}} ]
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex justify-content-start m-0">

                                    <a href="{{route('role.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit text-warning"></i></a>


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
    <div class="form-group">



    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('role.store')}}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>Role Name</b></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="title"><b>Select Permission</b></label><br>
                            @foreach($permissions as $permission)
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-lg">
                                        <input type="checkbox"  name="permission[]" value="{{$permission->name}}">


                                        <span></span>
                                        {{$permission->name}}
                                    </label>

                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
