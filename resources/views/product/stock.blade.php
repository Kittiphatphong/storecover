@extends('layouts.newApp')
@section('title','Stocks')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang("Product")</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('product.index')}}" class="text-muted">@lang("List")</a>
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">


    </div>
@endsection


@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 container">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm">ເພີ່ມສະຕອກ</h3>
                <!--begin::Layout-->
                <div class="flex-row-fluid">
                    <!--begin::Section-->
                    <div class="row">
                        <div class="col-md-7 col-lg-12 col-xxl-7">
                            <!--begin::Engage Widget 14-->
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-body p-15 pb-20" class="border">
                                    <form method="get" action="{{route('stock.index')}}" >

                                        <div class="row mb-6 border py-3 rounded bg-light-primary">

                                            <input type="hidden"   name="id" value="{{$edit->id}}">
                                            <div class="col-12">
                                                <div class=" input-group row">
                                                    <input id="kt_touchspin_2" type="number" value="1" class="form-control rounded" name="amount"/>
                                                    <button type="submit" class="btn btn-primary ml-1"><i class="fa fa-plus"></i>@lang("Add")</button>
                                                </div>
                                            </div>

                                        </div>


                                    </form>
                                    <div class="row mb-17">
                                        <div class="col-xxl-5 mb-11 mb-xxl-0">
                                            <!--begin::Image-->
                                            <div class="card card-custom card-stretch">
                                                <div class="card-body p-0 rounded px-10 py-15 d-flex align-items-center justify-content-center">
                                                    <img src="{{$edit->image}}" class="mw-100 w-200px" style="transform: scale(1.6);" />
                                                </div>
                                            </div>
                                            <!--end::Image-->
                                        </div>
                                        <div class="col-xxl-7 pl-xxl-11">
                                            <h2 class="font-weight-bolder text-dark mb-7" style="font-size: 32px;">

                                                    {{$edit->name}}
                                             </h2>
                                            <div class="font-size-h2 mb-7 text-dark-50">@lang('From')
                                                <span class="text-info font-weight-boldest ml-2">{{number_format($edit->sell_price)}}</span></div>
                                            <div class="line-height-xl">

                                                    {{$edit->description}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Info-->
                                        <div class="col-6 col-md-4">
                                            <div class="mb-8 d-flex flex-column">
                                                <span class="text-dark font-weight-bold mb-4">ປະເພດສິນຄ້າ</span>
                                                <span class="text-muted font-weight-bolder font-size-lg">
                                                        {{$edit->product_types->name}}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <div class="mb-8 d-flex flex-column">
                                                <span class="text-dark font-weight-bold mb-4">@lang("Cost Price")</span>
                                                <span class="text-muted font-weight-bolder font-size-lg">{{number_format($edit->cost_price)}}</span>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <div class="mb-8 d-flex flex-column">
                                                <span class="text-dark font-weight-bold mb-4">ມີຢູ່</span>
                                                <span class="text-muted font-weight-bolder font-size-lg">      @if($edit->stocks)
                                                        {{number_format($edit->sumStocks())}}
                                                    @else
                                                        0
                                                    @endif</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="mb-8 d-flex flex-column">
                                                <span class="text-dark font-weight-bold mb-4">ຂາຍແລ້ວ</span>
{{--                                                <span class="text-muted font-weight-bolder font-size-lg">{{number_format($edit->orderItems->sum('quantity'))}}</span>--}}
                                                <span class="text-muted font-weight-bolder font-size-lg">
                                                    @if($edit->stocks)
                                                        {{number_format($edit->sellItems())}}
                                                    @else
                                                        0
                                                    @endif</span>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4">
                                            <div class="mb-8 d-flex flex-column">
                                                <span class="text-dark font-weight-bold mb-4">ຂາຍທັງໝົດ</span>
                                                <span class="text-muted font-weight-bolder font-size-lg">{{number_format($edit->totalSell())}}</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="mb-8 d-flex flex-column">
                                                <span class="text-dark font-weight-bold mb-4">ກຳໄລ</span>
                                                <span class="text-muted font-weight-bolder font-size-lg">{{number_format($edit->totalSell()-$edit->balance())}}</span>
                                            </div>
                                        </div>


                                        <!--end::Info-->
                                    </div>

                                </div>
                            </div>
                            <!--end::Engage Widget 14-->
                        </div>
                        <div class="col-md-5 col-lg-12 col-xxl-5">
                            <!--begin::List Widget 19-->
                            <div class="card card-custom card-stretch card-stretch-half gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-6 mb-2">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">ຂໍ້ມູນສະຕອກ</span>
                                        <span class="text-muted font-weight-bold font-size-sm">{{number_format(\App\Models\Stock::where("product_id",$edit->id)->count())}} @lang('List')</span>
                                    </h3>
                                    {{--                                    <div class="card-toolbar">--}}
                                    {{--                                        <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">Upload</a>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                            @foreach(\App\Models\Stock::where("product_id",$edit->id)->latest()->paginate(10) as $stock)
                                                <!--begin::Item-->
                                                <tr>
                                                    <td class="w-40px align-middle pb-6 pl-0 pr-2">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-success">
																				<span class="symbol-label">
																					<span class="svg-icon svg-icon-lg svg-icon-success">
																						<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																								<rect x="0" y="0" width="24" height="24" />
																								<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																								<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
																							</g>
																						</svg>
                                                                                        <!--end::Svg Icon-->
																					</span>
																				</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </td>
                                                    <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">{{$stock->created_at}} </td>
                                                    <td class="font-weight-bold text-muted text-right align-middle pb-6">{{$stock->users->email}}</td>
                                                    <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6">{{number_format($stock->amount)}}</td>
                                                </tr>
                                                <!--end::Item-->
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{\App\Models\Stock::where("product_id",$edit->id)->latest()->paginate(10)->withQueryString()->links("pagination::bootstrap-4")}}
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 19-->

                        </div>
                    </div>

                </div>
                <!--end::Layout-->
            </div>
        </div>
    </div>












@endsection
