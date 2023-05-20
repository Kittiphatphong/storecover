@extends('layouts.fontApp')
@section('title','Cart')



@section('content')


    <div class="content d-flex flex-column flex-column-fluid" >
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Page Layout-->
                <div class="d-flex flex-row">

    <div class="flex-row-fluid ml-lg-12">
        <!--begin::Section-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">ກະຕ່າຂອງທ່ານ</span>
                </h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="{{route('home')}}" class="btn btn-primary font-weight-bolder font-size-sm">ສັ່ງສິນຄ້າຕື່ມ</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <div class="card-body">
                <!--begin::Shopping Cart-->
                <div class="table-responsive">
                    <table class="table">
                        <!--begin::Cart Header-->
                        <thead>
                        <tr>
                            <th>ສິນຄ້າ</th>
                            <th class="text-center">ຈຳນວນ</th>
                            <th class="text-right">ລາຄາ</th>
                            <th class="text-right">@lang('Total')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <!--end::Cart Header-->
                        <tbody>
                        <!--begin::Cart Content-->
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr>
                            <td class="d-flex align-items-center font-weight-bolder">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                    <div class="symbol-label" style="background-image: url({{$details['image']}})"></div>
                                </div>
                                <!--end::Symbol-->
                                <a href="#" class="text-dark text-hover-primary">{{$details['name']}}</a>
                            </td>
                            <td class="text-center align-middle">
                                @if($details['quantity']<=1)
                                    <a href="{{route('remove.from.cart',['id'=>$details['id']])}}" class="btn btn-xs btn-light-danger btn-icon mr-2">
                                @else
                                    <a href="{{ route('remove.to.cart', $details['id']) }}" class="btn btn-xs btn-light-danger btn-icon mr-2">
                                @endif


                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <span class="mr-2 font-weight-bolder">{{$details['quantity']}}</span>

                                <a href="{{ route('add.to.cart', $details['id']) }}" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>


                            </td>
                            <td class="text-right align-middle font-weight-bolder font-size-h5">{{number_format($details['price'])}}</td>
                            <td class="text-right align-middle font-weight-bolder font-size-h5">{{number_format($details['price']*$details['quantity'])}}</td>
                            <td class="text-right align-middle">
                                <a href="{{route('remove.from.cart',['id'=>$details['id']])}}" class="btn btn-danger font-weight-bolder font-size-sm"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        <!--end::Cart Content-->
                        <!--begin::Cart Footer-->
                        <tr>
                            <td colspan="3"></td>
                            <td class="font-weight-bolder font-size-h4 text-right">@lang("Total")</td>
                            <td class="font-weight-bolder font-size-h4 text-right">{{number_format($total)}}</td>
                        </tr>


                        <!--end::Cart Footer-->
                        </tbody>
                    </table>
                </div>
                <a href="{{route('checkout')}}" class="btn btn-lg btn-success float-right">ສັ່ງເລີຍ</a>
                <!--end::Shopping Cart-->
            </div>
        </div>
        <!--end::Section-->
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


