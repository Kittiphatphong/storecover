@extends('layouts.fontApp')
@section('title','Stores')



@section('content')
    <!--begin::Entry-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Page Layout-->

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->

            <!--end::Row-->
            <!--begin::Row-->
            <div class="row flex-wrap ">
                <!--begin::Col-->
                @foreach($list_stores as $item)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">

                            </div>
                            <!--end::Toolbar-->
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-7">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4">
                                    <div class="symbol symbol-circle symbol-lg-75">
                                        <img src="{{$item->image}}" alt="image" />
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$item->fname}}</a>
                                    <span class="text-muted font-weight-bold">{{$item->lname}}</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::User-->
                            <!--begin::Desc-->
                            <p class="mb-7"><i class="fas fa-map-pin mr-2"></i>{{$item->address}}</p>
                            <!--end::Desc-->
                            <!--begin::Info-->
                            <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">ເບີ:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{$item->mobile}}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">ເມວ:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{$item->email}}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">ສິນຄ້າ:</span>
                                    <span class="text-muted font-weight-bold">{{$item->products->count()}}</span>
                                </div>
                            </div>
                            <!--end::Info-->
                            <a href="{{route('store.detail',['id'=>$item->id])}}" class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4">ເຂົ້າເບີ່ງ</a>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end:: Card-->
                </div>
            @endforeach
                <!--end::Col-->


            </div>
            <!--end::Row-->
            <!--begin::Pagination-->
            @if($list_stores->hasPages())
            <div class="card card-custom">
                <div class="card-body py-7">
                    <!--begin::Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        {{$list_stores->withQueryString()->links("pagination::bootstrap-4")}}
                    </div>
                    <!--end:: Pagination-->
                </div>
            </div>
            <!--end::Pagination-->
            @endif
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
                </div>
        </div>
    </div>
@endsection


