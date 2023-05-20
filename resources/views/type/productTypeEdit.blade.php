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

    {{--        <a href="{{route('slide.index')}}" class="btn btn-light-primary font-weight-bolder btn-sm" ><i class="fas fa-list"></i> Slider List</a>--}}

    <!--end::Actions-->

    </div>

@endsection


@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h3 class="bg-white  font-weight-bolder  p-4 mb-4 shadow-sm"><i class="fas fa-sliders-h mr-2"></i>ແກ້ໄຂປະເພດສິນຄ້າ </h3>


                <form action="{{route('product-type.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" name="name" class="form-control" value="{{old('name',$edit->name)}}">
                        </div>



                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-block">@lang('Save changes')</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



@endsection
