@extends('layouts.newApp')
@section('title','Dashboard')

@section('header')


    <div class="d-flex align-items-baseline flex-wrap mr-5">

        <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('Dashboard')</h5>
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}" class="text-muted">@lang('Dashboard')</a>
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>


@endsection


@section('content')


    <div class="" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



                    <!--Begin::Row-->
                    <div class="d-flex justify-content-start flex-wrap" ">
                        <div class="col-xl-3">
                            <!--begin::Stats Widget 29-->
                            <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                                <!--begin::Body-->
                                <a href="#">
                                <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
												<i class="fas fa-house-user fa-2x text-primary"></i>
                                                    <!--end::Svg Icon-->
												</span>
                                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">10</span>
                                    <span class="font-weight-bold text-muted "><b>@lang('Users')</b></span>
                                </div>
                                </a>
                                <!--end::Body-->
                            </div>
                            <!--end::Stats Widget 29-->
                        </div>

                        <div class="col-xl-3">

                            <!--begin::Stats Widget 29-->
                            <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                                <!--begin::Body-->
                                <a href="">
                                <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
												<i class="fas fa-users fa-2x text-primary"></i>
                                                    <!--end::Svg Icon-->
												</span>
                                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">10</span>
                                    <span class="font-weight-bold text-muted "><b>@lang('Clients')</b></span>
                                </div>
                                <!--end::Body-->
                                </a>
                            </div>

                            <!--end::Stats Widget 29-->
                        </div>

                        <div class="col-xl-3">



                            <!--end::Stats Widget 29-->
                        </div>




                    </div>
                    <!--End::Row-->


        </div>
    </div>



@endsection
