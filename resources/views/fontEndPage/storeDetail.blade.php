@extends('layouts.fontApp')
@section('title','Store Details')



@section('content')

    <!--begin::Entry-->

    <!--end::Entry-->

    <div class="container mt-4">

                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="{{$store->image}}" />
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">

                                </div>
                            </div>
                            <!--end: Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin: Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$store->fname}}
                                            <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                        <!--end::Name-->
                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
																		<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>{{$store->email}}</a>
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                		<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
														<i class="fas fa-mobile"></i>
                                                        </span>{{$store->mobile}}</a>

                                        </div>
                                        <!--end::Contacts-->
                                    </div>

                                </div>
                                <!--end: Title-->
                                <!--begin: Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">		<i class="fas fa-map-pin mr-2"></i>{{$store->address}}</div>
                                    <div class="d-flex flex-wrap align-items-center py-2">

                                    </div>
                                </div>
                                <!--end: Content-->
                            </div>
                            <!--end: Info-->
                        </div>
                        <div class="separator separator-solid my-7"></div>
                        <!--begin: Items-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">ຂາຍໄດ້ເງິນ</span>
                                    <span class="font-weight-bolder font-size-h5">
													<span class="text-dark-50 font-weight-bold"></span>{{number_format($total_sell)}}</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">ຈຳນວນຂາຍໄດ້</span>
                                    <span class="font-weight-bolder font-size-h5">
													<span class="text-dark-50 font-weight-bold"></span>{{number_format($amount_sell)}}</span>
                                </div>
                            </div>
                            <!--end: Item-->

                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">ຈຳນວນສິນຄ້າ</span>
                                    <a href="#" class="text-primary font-weight-bolder">{{$store->products->count()}}</a>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">ສິນຄ້າໃນສະຕອກ</span>
                                    <span class="font-weight-bolder font-size-h5">
													<span class="text-dark-50 font-weight-bold"></span>{{number_format($amount_stock)}}</span>
                                </div>
                            </div>
                            <!--end: Item-->



                        </div>
                        <!--begin: Items-->

                    </div>
                </div>



        <div class="row">

        @foreach($store_products =\App\Models\Product::where('store_id',$store->id)->latest()->paginate(8) as $product)
            <!--begin::Product-->
                <div class="col-md-3 col-lg-12 col-xxl-3">
                    <div class="card card-custom gutter-b card-stretch">

                        <div class="card-body d-flex flex-column rounded bg-light justify-content-between">

                            <div class="d-flex justify-content-between">

                                <div><img src="{{$product->stores->image}}" width="50px"></div>
                                <div><span class="badge badge-secondary">{{$product->stores->fname}}</span></div>
                            </div>
                            <div class="text-center rounded mb-4">
                                <img src="{{$product->image}}" class="mw-100 w-200px" />
                            </div>
                            <div class="d-flex justify-content-between text-muted mb-2">
                                <div>
                                    @lang('Stock') :  @if($product->stocks)
                                        {{number_format($product->sumStocks())}}
                                    @else
                                        0
                                    @endif
                                </div>
                                <div>
                                    ຂາຍແລ້ວ : @if($product->stocks)
                                        {{number_format($product->sellItems())}}
                                    @else
                                        0
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-between bg-secondary rounded p-1">
                                <div>
                                    <h4 class="font-size-h5">
                                        <a href="#" class="text-dark-75 font-weight-bolder">{{$product->name}}</a>
                                    </h4>
                                    <div class="font-size-h6 text-muted font-weight-bolder">{{number_format($product->sell_price)}}</div>

                                </div>

                                <div>
                                    @auth

                                        @if(\App\Models\User::find(Auth::user()->id)->user_type == 'customer')

                                            @if($product->sumStocks() >0)
                                                @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                        @if($details['id'] == $product->id)
                                                            <span class="badge badge-warning">{{$details['quantity']}}</span>
                                                        @endif
                                                    @endforeach
                                                @endif

                                                <a  href="{{ route('add.to.cart', $product->id) }}" class="btn btn-secondary">
                                                    <i class="fas fa-cart-plus fa-3x"></i>
                                                </a>
                                            @else
                                                <span   class="btn btn-text-muted">
                                                        <i class="fas fa-cart-plus fa-3x"></i>
                                                    </span>
                                            @endif
                                        @endif
                                    @else
                                        <a class="topbar-item "  href="{{route('client.login')}}">
                                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg">
											<span class="svg-icon svg-icon-xl svg-icon-light mr-2 ">

											         <i class=" far fa-user-circle"></i>
                                            </span>
                                                <span > @lang('Login')</span>
                                                <span class="pulse-ring"></span>
                                            </div>
                                        </a>
                                    @endauth

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Product-->
            @endforeach
        </div>
        {{$store_products->withQueryString()->links("pagination::bootstrap-4")}}

    </div>
@endsection


