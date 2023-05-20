@extends('layouts.newApp')
@section('title','Orders')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">ການຂາຍ</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('sell.index')}}" class="text-muted">@lang('List')</a>
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->

    {{--        <a  class="btn btn-light-primary font-weight-bolder btn-sm"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus-square"></i>@lang("Add")</a>--}}
    {{--       --}}
    <!--end::Actions-->

    </div>
@endsection


@section('content')
    @foreach($list_sells as $item)
        <div class="modal fade " id="ok{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content ">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">@lang("Order")</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-window-close fa-2x"></i>
                        </button>
                    </div>

                    <div class="card-body">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center px-8 px-md-0">
                            <div class="col-md-10">

                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">@lang('Order date')</span>
                                        <span class="opacity-70">{{$item->created_at}}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">@lang('Order Id')</span>
                                        <span class="opacity-70 ">{{$item->id}}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">@lang("Status")</span>
                                        <span class="label
            @if($item->status == "success")
                                            label-success
@elseif($item->status == "pending")
                                            label-warning
@else
                                            label-danger
@endif
                                            label-inline  float-right">@lang($item->status)
        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="pl-0 font-weight-bold text-muted text-uppercase">@lang("Ordered Items")</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">@lang("Qty")</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">@lang("Unit Price")</th>
                                            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">@lang("Amount")</th>
                                        </tr>
                                        </thead>
                                        <tbody>



                                        @foreach($item->orderItems as $orderItem)
                                            <tr class="font-weight-boldest border-bottom-0">
                                                <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                        <div class="symbol-label" style="background-image: url('{{$orderItem->products->image}}')"></div>
                                                    </div>

                                                        {{$orderItem->products->name}}

                                                </td>
                                                <td class="border-top-0 text-right py-4 align-middle">{{$orderItem->quantity}}</td>
                                                <td class="border-top-0 text-right py-4 align-middle">{{number_format($orderItem->sell_price)}}</td>
                                                <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">{{number_format($orderItem->sell_price*$orderItem->quantity)}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted text-uppercase">PAYMENT STATUS</th>
                                            <th class="font-weight-bold text-muted text-uppercase">PAYMENT DATE</th>
                                            <th class="font-weight-bold text-muted text-uppercase text-right">TOTAL PAID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-bolder">

                                            <td>  @if($item->payments){{$item->payments->status}}@endif</td>
                                            <td>  @if($item->payments){{$item->payments->created_at}} @endif</td>
                                            <td class="text-primary font-size-h3 font-weight-boldest text-right">
                                                @if($item->payments)
                                                    {{number_format($item->payments->amount)}}
                                                @else
                                                    {{number_format($item->total)}}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->



                        <!-- begin: Invoice action-->
                        @if($item->remark)

                            <div class="my-2">
                                <span class="text-danger h6">@lang("Remark") : </span>{{$item->remark}}
                            </div>

                    @endif


                        <form method="post" action="{{route('sell.update',$item->id)}}" >
                            @csrf
                            @method('PATCH')
                            <div class=" input-group pt-4">
                                <select class="form-control" name="status">

                                    <option value="success"
                                            @if($item->status == "success")
                                            selected
                                        @endif
                                    >@lang("Success")</option>
                                    <option value="pending"
                                            @if($item->status == "pending")
                                            selected
                                        @endif
                                    >@lang("Pending")</option>
                                    <option value="cancel"
                                            @if($item->status == "cancel")
                                            selected
                                        @endif
                                    >@lang("Cancel")</option>
                                </select>

                                <button type="submit" class="btn btn-primary ml-4">ຕົກລົງ</button>

                            </div>





                        </form>
                    <!-- end: Invoice action-->

                    </div>

                </div>




            </div>

        </div>
    @endforeach

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



        <!--Begin::Row-->
        <div class="row">
            <div class="col-xl-3">
                <!--begin::Stats Widget 29-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->

                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
												<i class="fas fa-cart-arrow-down fa-2x text-primary"></i>
                                                    <!--end::Svg Icon-->
												</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{number_format($all_orders->sum('total'))}}</span>
                        <span class="font-weight-bold text-muted "><b>@lang('Total Sales')</b></span>
                    </div>

                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 29-->
            </div>

            <div class="col-xl-3">

                <!--begin::Stats Widget 29-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->

                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
												<i class="fas fa-dollar-sign fa-2x text-primary"></i>
                                                    <!--end::Svg Icon-->
												</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{number_format($balance)}}</span>
                        <span class="font-weight-bold text-muted "><b>@lang('Balance')</b></span>
                    </div>
                    <!--end::Body-->

                </div>

                <!--end::Stats Widget 29-->
            </div>
            <div class="col-xl-3">

                <!--begin::Stats Widget 29-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->

                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
												<i class="fas fa-chart-pie fa-2x text-primary"></i>
                                                    <!--end::Svg Icon-->
												</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{number_format($all_orders->sum('total') - $balance)}}</span>
                        <span class="font-weight-bold text-muted "><b>@lang('Net Profit')</b></span>
                    </div>
                    <!--end::Body-->

                </div>

                <!--end::Stats Widget 29-->
            </div>
            <div class="col-xl-3">

                <!--begin::Stats Widget 29-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->

                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
												<i class="fas fa-list-ol fa-2x text-primary"></i>
                                                    <!--end::Svg Icon-->
												</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$all_orders->count()}}</span>
                        <span class="font-weight-bold text-muted "><b>@lang('Orders')</b></span>
                    </div>
                    <!--end::Body-->

                </div>

                <!--end::Stats Widget 29-->
            </div>

        </div>
    </div>
    <!--End::Row-->




    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h3 class="bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">@lang("List") @lang('Orders')</h3>

                <div class="card-body bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">

                    <form method="get" action="{{route('sell.index')}}">
                        <div class="row mb-6">
                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>@lang("Order Id"):

                                </label>
                                <input type="text" class="form-control"

                                       placeholder="@lang("Search") @lang("Order Id")"
                                       name="search_order_id"
                                       value="{{ request()->get('search_order_id') }}"
                                />
                            </div>

                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>@lang("Created at"):</label>
                                <div class="input-daterange input-group">
                                    <input type="date" class="form-control datatable-input" name="start" placeholder="From"  value="{{ request()->get('start') }}"/>
                                    <div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-ellipsis-h"></i>
															</span>
                                    </div>

                                    <input type="date" class="form-control datatable-input" name="end" placeholder="To" value="{{ request()->get('end') }}"/>
                                </div>
                            </div>

                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>@lang("Clients"):</label>
                                <input type="text" class="form-control"

                                       placeholder="@lang("Search") @lang("Clients")"
                                       name="search_client"
                                       value="{{ request()->get('search_client') }}"
                                />
                            </div>

                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>@lang("Status")</label>

                                <div class=" input-group">
                                    <select class="form-control" name="search_status">
                                        <option value=""
                                                @if(request()->get('search_status') == "")
                                                selected
                                            @endif
                                        >@lang("All")</option>
                                        <option value="success"
                                                @if(request()->get('search_status') == "success")
                                                selected
                                            @endif
                                        >@lang("Success")</option>
                                        <option value="pending"
                                                @if(request()->get('search_status') == "pending")
                                                selected
                                            @endif
                                        >@lang("Pending")</option>
                                        <option value="cancel"
                                                @if(request()->get('search_status') == "cancel")
                                                selected
                                            @endif
                                        >@lang("Cancel")</option>
                                    </select>

                                    <button type="submit" class="btn btn-outline-primary ml-4"><i class="fa fa-search"></i>@lang("Search")</button>
                                    <a href="{{route("sell.index")}}" class="btn btn-outline-warning ml-4"><i class="fas fa-undo"></i>@lang("Reset")</a>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>ໄອດີ</th>
                            <th>@lang("Created At")</th>

                            <th>@lang("Total")</th>
                            <th>
                                @lang("Store")
                            </th>

                            <th>@lang("Clients")</th>


                            <th>@lang("Action")</th>

                            <th>@lang("Updated At")</th>



                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_sells as $item)

                            <tr>
                                <td>
                                    <b>{{$item->id}}</b>



                                </td>
                                <td>{{$item->created_at}}                                    <span class="label
            @if($item->status == "success")
                                        label-success
@elseif($item->status == "pending")
                                        label-warning
@else
                                        label-danger
@endif
                                        label-inline  float-right">@lang($item->status)
        </span></td>

                                <td>
                                    <b>{{number_format($item->total)}}</b>
                                </td>
                                <td>
                                    @if($item->stores)
                                        {{$item->stores->email}}
                                    @else
                                        <span class="text-danger">@lang("N/A")</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->customers)
                                        {{$item->customers->email}}
                                    @else
                                        <span class="text-danger">@lang("N/A")</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start m-0">

                                        <button class="btn btn-link" data-toggle="modal" data-target="#ok{{$item->id}}"><i class="far fa-money-bill-alt text-primary"></i></button>

                                    </div>



                                </td>
                                <td>{{$item->updated_at}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{$list_sells->withQueryString()->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>



@endsection
