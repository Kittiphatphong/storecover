@extends('layouts.newApp')
@section('title','Payment')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang("Payments")</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('payment.index')}}" class="text-muted">@lang('List')</a>
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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">@lang("List") @lang('Payments')
                    <span class="bg-danger text-white rounded float-right px-1">{{number_format($all_payments->sum('amount'))}}</span> <span class="float-right mr-3">@lang("Total"):</span>
                </h3>
                <div class="card-body bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">
                    <form method="get" action="{{route('payment.index')}}">
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
                                    <input type="date" class="form-control datatable-input" name="start" placeholder="From" value="{{ request()->get('start') }}"/>
                                    <div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-ellipsis-h"></i>
															</span>
                                    </div>

                                    <input type="date" class="form-control datatable-input" name="end" placeholder="To" value="{{ request()->get('end') }}"/>
                                </div>
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
                                    <a href="{{route("payment.index")}}" class="btn btn-outline-warning ml-4"><i class="fas fa-undo"></i>@lang("Reset")</a>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>@lang("Order Id")</th>
                            <th>@lang("Created At")</th>

                            <th>@lang("Amount") </th>
                            <th>@lang("Type")</th>





                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_payments as $item)
                            <tr>
                                <td>
                                    <b>{{$item->sell_id}}</b>

                                </td>
                                <td>
                                    {{$item->created_at}}
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
                                </td>
                                <td>{{number_format($item->amount)}}</td>
                                <td>@if($item->type)
                                        <span class="bg-light-primary rounded p-2">{{$item->type}}</span>
                                    @else
                                        <span class="bg-light-danger rounded p-2">@lang("N/A")</span>
                                    @endif
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    {{$list_payments->withQueryString()->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>



@endsection
