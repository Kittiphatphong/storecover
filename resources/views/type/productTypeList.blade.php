@extends('layouts.newApp')
@section('title','Product Type')

@section('header')


    <div class="d-flex align-items-baseline flex-wrap mr-5">

        <h5 class="text-dark font-weight-bold my-1 mr-5">ປະເພດສິນຄ້າ</h5>
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('product-type.index')}}" class="text-muted">@lang('List')</a>
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->

        <button class="btn btn-light-primary font-weight-bolder btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i>ເພີ່ມປະເພດສິນຄ້າ</button>

        <!--end::Actions-->

    </div>

@endsection


@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h3 class="bg-white  font-weight-bolder  p-4 mb-4 shadow-sm"><i class="fas fa-warehouse mr-2"></i>ລາຍການປະເພດສິນຄ້າ</h3>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>

                            <th>@lang('Time')</th>
                            <th>@lang('Name')</th>
                            <th>ຈຳນວນ</th>


                            <th>@lang('Action')</th>
                            <th>@lang('Updated at')</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_product_types as $item)
                            <tr>

                                <td>{{$item->created_at}}</td>
                                <td>{{$item->name}}</td>

                                <td>{{$item->products->count()}}</td>

                                <td>
                                    <div class="d-flex justify-content-start m-0">
                                        <a href="{{route('product-type.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit text-warning"></i></a>
                                    </div>

                                </td>

                                <td>
                                    {{$item->updated_at}}
                                </td>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('ເພີ່ມປະເພດສິນຄ້າ')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('product-type.store')}}" method="post" >
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" name="name" class="form-control">
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
