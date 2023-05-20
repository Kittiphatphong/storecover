@extends('layouts.fontApp')
@section('title','Sells')



@section('content')
    @foreach($sells as $item)
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Page Layout-->
                <div class="d-flex flex-row">
    <!--begin::Layout-->
    <div class="flex-row-fluid ml-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">

                <!-- begin: Invoice header-->
                <div class="row justify-content-center px-8 px-md-0">
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                          <img src="{{$item->stores->image}}" width="70px" height="70px">
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <!--begin::Logo-->
                                <h1   class="mb-5 badge badge-secondary">
                                 {{$item->stores->fname}}
                                </h1>
                                <!--end::Logo-->
                                <span class="d-flex flex-column align-items-md-end opacity-70">
																	<span><i class="fa fa-map-pin mr-2"></i>{{$item->stores->address}}</span>
                                    <span><i class="fa fa-phone mr-2"></i>{{$item->stores->mobile}} <i class="fas fa-envelope mr-2"></i>{{$item->stores->email}}</span>

                            </div>
                        </div>
                        <div class="border-bottom w-100"></div>
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




            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Layout-->
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Page Layout-->
                <div class="d-flex flex-row">
                    <div class="flex-row-fluid ml-lg-12">
        {{$sells->withQueryString()->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


